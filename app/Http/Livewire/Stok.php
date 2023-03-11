<?php

namespace App\Http\Livewire;

use App\Models\Stok as ModelsStok;
use App\Models\StokImage;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Stok extends Component
{
    use WithFileUploads;

    public $title;
    public $form = [];
    public $stokModal = false;
    public $deleteStokModal = false;
    public $aksiStokModal = 'tambahStok';
    public $buttonStokModal = 'Tambah';

    protected $listeners = [
        'stokModal' => 'openStokModal',
        'deleteStokModal' => 'openDeleteStokModal',
    ];

    protected $rules = [
        'form.nama' => 'required|unique:stoks,nama|max:255',
        'form.hrg_jual' => 'required|numeric',
        'form.stok' => 'required|integer',
        'form.unit' => 'required|max:32',
        'form.ket' => 'nullable',
    ];

    protected $validationAttributes = [
        'form.nama' => 'Nama Stok',
        'form.hrg_jual' => 'Harga Stok',
        'form.stok' => 'Stok Stok',
        'form.unit' => 'Satuan Stok',
        'form.ket' => 'Keterangan Stok',
        'form.img.*' => 'Gambar Stok', // 1MB Max
    ];

    // public function updated()
    // {
    //     if (array_key_exists('id', $this->form)) {
    //         $this->rules['form.nama'] = "required|unique:stoks,nama," . $this->form['id'] . "|max:255";
    //     }
    //     $this->validate($this->rules);
    // }

    public function removeImage($i)
    {
        $this->form['src'][$i] = '';
        $this->form['img'][$i] = '';
    }

    public function openStokModal($id = null)
    {
        if ($id) {
            $this->form = ModelsStok::where('stoks.id', $id)
                ->first()
                ->toArray();

            $this->form['src'] = StokImage::where('stok_id', $this->form['id'])->select('image')->oldest()->get()->map(fn ($item) => $item->image)->toArray();
            $this->aksiStokModal = 'editStok';
            $this->buttonStokModal = 'Edit';
        } else {
            if ($this->aksiStokModal != 'tambahStok') {
                $this->form = [];
            }
            $this->form['unit'] = 'KG';
            $this->aksiStokModal = 'tambahStok';
            $this->buttonStokModal = 'Tambah';
        }

        $this->stokModal = true;
    }

    public function openDeleteStokModal($id)
    {
        $this->form = ModelsStok::find($id)->toArray();
        $this->deleteStokModal = true;
    }

    public function tambahStok()
    {
        $this->validate();
        $this->form['img']->store('public/images/product');

        ModelsStok::create([
            'nama' => $this->form['nama'],
            'hrg_jual' => $this->form['hrg_jual'],
            'stok' => $this->form['stok'],
            'unit' => $this->form['unit'],
            'image' => $this->form['img']->hashName(),
            'ket' => $this->form['ket'],
        ]);

        $this->stokModal = false;
        $this->emit('stokTableColumns');
    }

    public function editStok()
    {
        if (array_key_exists('img', $this->form)) {
            foreach ($this->form['img'] as $key => $img) {
                if (!is_string($img)) {
                    $this->rules['form.img.' . $key] = 'image|max:1024';
                }
            }
        }

        $this->rules['form.nama'] = "required|unique:stoks,nama," . $this->form['id'] . "|max:255";
        $this->validate();

        $stok = ModelsStok::find($this->form['id']);
        $stok->nama = $this->form['nama'];
        $stok->hrg_jual = $this->form['hrg_jual'];
        $stok->stok = $this->form['stok'];
        $stok->unit = $this->form['unit'];
        $stok->ket = $this->form['ket'];
        $stok->save();

        StokImage::where('stok_id', $stok->id)->delete();

        for ($i = 0; $i < 4; $i++) {
            if (array_key_exists('img', $this->form) && array_key_exists($i, $this->form['img']) && $this->form['img'][$i] != '') {
                $this->form['img'][$i]->store('public/images/products');
                StokImage::create([
                    'stok_id' => $stok->id,
                    'image' => $this->form['img'][$i]->hashName()
                ]);
            } else if (array_key_exists('src', $this->form) && array_key_exists($i, $this->form['src']) && $this->form['src'][$i] != '') {
                StokImage::create([
                    'stok_id' => $stok->id,
                    'image' => $this->form['src'][$i]
                ]);
            }
        }

        $this->stokModal = false;
        $this->emit('stokTableColumns');
    }

    public function deleteStok()
    {
        ModelsStok::destroy($this->form['id']);
        $this->deleteStokModal = false;
        $this->emit('stokTableColumns');
    }

    public function render()
    {
        return view('livewire.stok');
    }
}
