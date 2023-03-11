<?php

namespace App\Http\Livewire;

use App\Models\Kriteria as ModelsKriteria;
use Livewire\Component;

class Kriteria extends Component
{
    public $kriteriaModal = false;
    public $deleteKriteriaModal = false;
    public $id_kriteria = 0;

    public $title;

    public $tipes = [];
    public $form = [];

    public $aksiKriteriaModal = 'tambahKriteria';
    public $buttonKriteriaModal = 'Tambah';

    protected $listeners = [
        'kriteriaModal' => 'openKriteriaModal',
        'deleteKriteriaModal' => 'openDeleteKriteriaModal',
    ];

    protected $rules = [
        'form.nama' => 'required|unique:kriterias,nama|max:255',
        'form.kepentingan' => 'required|int',
        'form.tipe' => 'required|max:255',
    ];

    public function mount()
    {
        // $this->tipes = collect([
        //     [ 'id' => 1, 'nama' => 'Murah'],
        //     [ 'id' => 2, 'nama' => 'Normal'],
        //     [ 'id' => 3, 'nama' => 'Mahal'],
        //     [ 'id' => 4, 'nama' => 'Sangat Mahal'],
        // ]);
        $this->tipes = collect([
            [ 'id' => 'cost', 'nama' => 'Cost'],
            [ 'id' => 'benefit', 'nama' => 'Benefit'],
        ]);
    }

    public function openKriteriaModal($id = null)
    {
        if ($id) {
            $kriteria = ModelsKriteria::find($id);
            if (!$kriteria) return;
            $this->id_kriteria = $kriteria->id;
            $this->form['nama'] = $kriteria->nama;
            $this->form['kepentingan'] = $kriteria->kepentingan;
            $this->form['tipe'] = $kriteria->tipe;
            $this->aksiKriteriaModal = 'editKriteria';
            $this->buttonKriteriaModal = 'Edit';
        } else {
            $this->form = [];
            $this->aksiKriteriaModal = 'tambahKriteria';
            $this->buttonKriteriaModal = 'Tambah';
        }

        $this->kriteriaModal = true;
    }

    public function openDeleteKriteriaModal($id)
    {
        if ($id) {
            $kriteria = ModelsKriteria::find($id);
            if (!$kriteria) return;
            $this->id_kriteria = $kriteria->id;
            $this->form['nama'] = $kriteria->nama;
            $this->form['kepentingan'] = $kriteria->kepentingan;
            $this->form['tipe'] = $kriteria->tipe;
        }

        $this->deleteKriteriaModal = true;
    }

    public function tambahKriteria()
    {
        $this->validate();

        ModelsKriteria::create([
            'nama' => $this->form['nama'],
            'kepentingan' => $this->form['kepentingan'],
            'tipe' => $this->form['tipe']
        ]);

        $this->kriteriaModal = false;

        $this->emit('kriteriaTableColumns');
    }

    public function editKriteria()
    {
        $this->rules['form.nama'] = "required|unique:kriterias,nama,$this->id_kriteria|max:255";
        $this->validate();

        $kriteria = ModelsKriteria::find($this->id_kriteria);
        $kriteria->nama = $this->form['nama'];
        $kriteria->kepentingan = $this->form['kepentingan'];
        $kriteria->tipe = $this->form['tipe'];
        $kriteria->save();

        $this->id_kriteria = 0;
        $this->kriteriaModal = false;

        $this->emit('kriteriaTableColumns');
    }

    public function deleteKriteria()
    {
        ModelsKriteria::destroy($this->id_kriteria);
        $this->id_kriteria = 0;
        $this->deleteKriteriaModal = false;

        $this->emit('kriteriaTableColumns');
    }

    public function render()
    {
        return view('livewire.kriteria');
    }
}
