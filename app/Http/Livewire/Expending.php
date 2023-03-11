<?php

namespace App\Http\Livewire;

use App\Models\Expending as ModelsExpending;
use App\Models\Status;
use App\Models\Stok;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Expending extends Component
{
    public $title;
    public $statuses;
    public $users;
    public $detailModal = false;
    public $status_id = '';
    public $detailOrder;

    public $form = [];
    public $stoks;
    public $expendingModal = false;
    public $deleteExpendingModal = false;
    public $aksiExpendingModal = 'tambahExpending';
    public $buttonExpendingModal = 'Tambah';

    protected $listeners = [
        'expendingDetail' => 'openExpendingDetail',
        'expendingModal' => 'openExpendingModal',
        'deleteExpendingModal' => 'openDeleteExpendingModal',
    ];

    protected $rules = [
        'form.user_id' => 'required|exists:users,id',
        'form.stok_id' => 'required|exists:stoks,id',
        // 'form.status_id' => 'required|exists:statuses,id',
        'form.jumlah' => 'required|integer',
    ];

    protected $validationAttributes = [
        'form.user_id' => 'Supplier',
        'form.stok_id' => 'Stok',
        // 'form.status_id' => 'Status',
        'form.jumlah' => 'Jumlah',
    ];

    // public function updated()
    // {
    //     $this->validate($this->rules);
    // }

    public function mount()
    {
        $this->users = User::whereHas('roles', fn ($q) => $q->where('name', 'pemasok'))->get();
        $this->statuses = Status::all();
        $this->stoks = Stok::all();
    }

    public function openExpendingDetail($id)
    {
        $this->detailOrder = ModelsExpending::where('expendings.id', $id)
            ->selectRaw("expendings.*, statuses.nama as statuses_nama, statuses.id as status_id, JSON_UNQUOTE(JSON_EXTRACT(stok_data, '$.id')) as stok_id")
            ->join('statuses', 'expendings.status_id', '=', 'statuses.id')
            ->first();

        if ($this->detailOrder) {
            $this->status_id = $this->detailOrder->status_id;
            $this->detailModal = true;
        }
    }

    public function openExpendingModal($id = null)
    {
        if ($id) {
            $this->form = ModelsExpending::where('id', $id)
                ->selectRaw("id, JSON_UNQUOTE(JSON_EXTRACT(stok_data, '$.id')) as stok_id, jumlah, user_id")
                ->first()
                ->toArray();

            $this->aksiExpendingModal = 'editExpending';
            $this->buttonExpendingModal = 'Edit';
        } else {
            if ($this->aksiExpendingModal != 'tambahExpending') {
                $this->form = [];
            }
            $this->aksiExpendingModal = 'tambahExpending';
            $this->buttonExpendingModal = 'Tambah';
        }

        $this->expendingModal = true;
    }

    public function openDeleteExpendingModal($id)
    {
        $this->form = ModelsExpending::where('id', $id)
            ->selectRaw("id, JSON_UNQUOTE(JSON_EXTRACT(stok_data, '$.id')) as stok_id, jumlah")
            ->first()
            ->toArray();

        $this->deleteExpendingModal = true;
    }

    public function tambahExpending()
    {
        $this->validate();

        ModelsExpending::create([
            'user_id' => $this->form['user_id'],
            'stok_data' => Stok::where('stoks.id', $this->form['stok_id'])
                ->selectRaw('stoks.*, stok_images.image as image')
                ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                ->first(),
            'jumlah' => $this->form['jumlah'],
            'status_id' => Status::where('nama', 'Pending')->first()->id,
        ]);

        $this->expendingModal = false;
        $this->emit('expendingTableColumns');
    }

    public function editExpending()
    {
        $this->validate();

        $expending = ModelsExpending::find($this->form['id']);

        // Stok::where('id', $this->form['stok_id'])->decrement('stok', $expending->jumlah);
        // Stok::where('id', $this->form['stok_id'])->increment('stok', $this->form['jumlah']);

        $expending->user_id = $this->form['user_id'];
        $expending->stok_data = Stok::where('stoks.id', $this->form['stok_id'])
            ->selectRaw('stoks.*, stok_images.image as image')
            ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
            ->first();
        $expending->jumlah = $this->form['jumlah'];
        // $expending->status_id = $this->form['status_id'];
        $expending->save();

        $this->expendingModal = false;
        $this->emit('expendingTableColumns');
    }

    public function tolakExpending()
    {
        $expending = ModelsExpending::where('expendings.id', $this->detailOrder->id)->first();
        $expending->status_id = Status::where('nama', 'Rejected')->first()->id;
        $expending->save();

        $this->detailModal = false;
        $this->emit('expendingTableColumns');
    }

    public function terimaExpending()
    {
        $expending = ModelsExpending::where('expendings.id', $this->detailOrder->id)->first();
        $expending->status_id = Status::where('nama', 'Accepted')->first()->id;
        $expending->save();

        Stok::where('id', $expending->stok_data['id'])->increment('stok', $expending->jumlah);

        $this->detailModal = false;
        $this->emit('expendingTableColumns');
    }

    public function deleteExpending()
    {
        // Stok::where('id', $this->form['stok_id'])->decrement('stok', $this->form['jumlah']);
        ModelsExpending::destroy($this->form['id']);
        $this->deleteExpendingModal = false;
        $this->emit('expendingTableColumns');
    }

    public function render()
    {
        return view('livewire.expending');
    }
}
