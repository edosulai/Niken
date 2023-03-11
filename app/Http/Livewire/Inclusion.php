<?php

namespace App\Http\Livewire;

use App\Models\Inclusion as ModelsInclusion;
use App\Models\Stok;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Inclusion extends Component
{
    public $title;
    public $form = [];
    public $stoks;
    public $inclusionModal = false;
    public $deleteInclusionModal = false;
    public $aksiInclusionModal = 'tambahInclusion';
    public $buttonInclusionModal = 'Tambah';

    protected $listeners = [
        'inclusionModal' => 'openInclusionModal',
        'deleteInclusionModal' => 'openDeleteInclusionModal',
    ];

    protected $rules = [
        'form.stok_id' => 'required|exists:stoks,id',
        'form.jumlah' => 'required|integer',
    ];

    protected $validationAttributes = [
        'form.stok_id' => 'Stok',
        'form.jumlah' => 'Jumlah',
    ];

    public function updated()
    {
        $this->validate($this->rules);
    }

    public function mount()
    {
        $this->stoks = Stok::all();
    }

    public function openInclusionModal($id = null)
    {
        if ($id) {
            $this->form = ModelsInclusion::where('id', $id)
                ->selectRaw("id, JSON_UNQUOTE(JSON_EXTRACT(stok_data, '$.id')) as stok_id, jumlah")
                ->first()
                ->toArray();

            $this->aksiInclusionModal = 'editInclusion';
            $this->buttonInclusionModal = 'Edit';
        } else {
            if ($this->aksiInclusionModal != 'tambahInclusion') {
                $this->form = [];
            }
            $this->aksiInclusionModal = 'tambahInclusion';
            $this->buttonInclusionModal = 'Tambah';
        }

        $this->inclusionModal = true;
    }

    public function openDeleteInclusionModal($id)
    {
        $this->form = ModelsInclusion::where('id', $id)
            ->selectRaw("id, JSON_UNQUOTE(JSON_EXTRACT(stok_data, '$.id')) as stok_id, jumlah")
            ->first()
            ->toArray();

        $this->deleteInclusionModal = true;
    }

    public function tambahInclusion()
    {
        $this->validate();

        ModelsInclusion::create([
            'stok_data' => Stok::where('stoks.id', $this->form['stok_id'])
                ->selectRaw('stoks.*, stok_images.image as image')
                ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                ->first(),
            'jumlah' => $this->form['jumlah'],
        ]);

        Stok::where('id', $this->form['stok_id'])->increment('stok', $this->form['jumlah']);

        $this->inclusionModal = false;
        $this->emit('inclusionTableColumns');
    }

    public function editInclusion()
    {
        $this->validate();

        $inclusion = ModelsInclusion::find($this->form['id']);

        Stok::where('id', $this->form['stok_id'])->decrement('stok', $inclusion->jumlah);
        Stok::where('id', $this->form['stok_id'])->increment('stok', $this->form['jumlah']);

        $inclusion->stok_data = Stok::where('stoks.id', $this->form['stok_id'])
            ->selectRaw('stoks.*, stok_images.image as image')
            ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
            ->first();
        $inclusion->jumlah = $this->form['jumlah'];
        $inclusion->save();

        $this->inclusionModal = false;
        $this->emit('inclusionTableColumns');
    }

    public function deleteInclusion()
    {
        Stok::where('id', $this->form['stok_id'])->decrement('stok', $this->form['jumlah']);
        ModelsInclusion::destroy($this->form['id']);
        $this->deleteInclusionModal = false;
        $this->emit('inclusionTableColumns');
    }

    public function render()
    {
        return view('livewire.inclusion');
    }
}
