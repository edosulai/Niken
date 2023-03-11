<?php

namespace App\Http\Livewire;

use App\Models\Alternatif as ModelsAlternatif;
use App\Models\Stok;
use Livewire\Component;

class Alternatif extends Component
{
    public $alternatifModal = false;
    public $deleteAlternatifModal = false;
    public $id_alternatif = 0;

    public $title;

    public $stoks;
    public $k_value;

    public $form = [];

    public $aksiAlternatifModal = 'tambahAlternatif';
    public $buttonAlternatifModal = 'Tambah';

    protected $listeners = [
        'alternatifModal' => 'openAlternatifModal',
        'deleteAlternatifModal' => 'openDeleteAlternatifModal',
    ];

    public function mount()
    {
        $this->stoks = Stok::all();

        $this->k_value = collect([
            [
                'k_nama' => 'harga',
                'k_nilai' => [
                    ['nama' => 'Murah', 'id' => 1],
                    ['nama' => 'Normal', 'id' => 2],
                    ['nama' => 'Mahal', 'id' => 3],
                    ['nama' => 'Sangat Mahal', 'id' => 4]
                ]
            ], [
                'k_nama' => 'ukuran',
                'k_nilai' => [
                    ['nama' => 'Kecil', 'id' => 1],
                    ['nama' => 'Sedang', 'id' => 2],
                    ['nama' => 'Besar', 'id' => 3]
                ]
            ], [
                'k_nama' => 'berat',
                'k_nilai' => [
                    ['nama' => 'Dibawah Standart', 'id' => 1],
                    ['nama' => 'Standart', 'id' => 2],
                    ['nama' => 'Diatas Standart', 'id' => 3]
                ]
            ], [
                'k_nama' => 'aroma',
                'k_nilai' => [
                    ['nama' => 'Kurang Harum', 'id' => 1],
                    ['nama' => 'Harum', 'id' => 2],
                    ['nama' => 'Sangat Harum', 'id' => 3]
                ]
            ], [
                'k_nama' => 'bentuk',
                'k_nilai' => [
                    ['nama' => 'Tidak Beraturan', 'id' => 1],
                    ['nama' => 'Bulat', 'id' => 2],
                    ['nama' => 'Oval/Lonjong', 'id' => 3]
                ]
            ], [
                'k_nama' => 'rasa',
                'k_nilai' => [
                    ['nama' => 'Sedikit Pahit', 'id' => 1],
                    ['nama' => 'Manis', 'id' => 2],
                    ['nama' => 'Sangat Manis', 'id' => 3]
                ]
            ]
        ]);
    }

    public function openAlternatifModal($id = null)
    {
        if ($id) {
            $alternatif = ModelsAlternatif::find($id);
            if (!$alternatif) return;
            $this->id_alternatif = $alternatif->id;

            $this->form['stok'] = $alternatif->stok_id;

            $this->form['harga'] = $alternatif->k_value[0];
            $this->form['ukuran'] = $alternatif->k_value[1];
            $this->form['berat'] = $alternatif->k_value[2];
            $this->form['aroma'] = $alternatif->k_value[3];
            $this->form['bentuk'] = $alternatif->k_value[4];
            $this->form['rasa'] = $alternatif->k_value[5];

            $this->aksiAlternatifModal = 'editAlternatif';
            $this->buttonAlternatifModal = 'Edit';
        } else {
            $this->form = [
                'stok' => Stok::all()->first()->id,
                'harga' => 1,
                'ukuran' => 1,
                'berat' => 1,
                'aroma' => 1,
                'bentuk' => 1,
                'rasa' => 1
            ];
            $this->aksiAlternatifModal = 'tambahAlternatif';
            $this->buttonAlternatifModal = 'Tambah';
        }

        $this->alternatifModal = true;
    }

    public function openDeleteAlternatifModal($id)
    {
        if ($id) {
            $alternatif = ModelsAlternatif::find($id);
            if (!$alternatif) return;
            $this->id_alternatif = $alternatif->id;
            $this->form['nama'] = Stok::find($alternatif->stok_id)->nama;
        }

        $this->deleteAlternatifModal = true;
    }

    public function tambahAlternatif()
    {
        ModelsAlternatif::create([
            'stok_id' => $this->form['stok'],
            'k_value' => [
                $this->form['harga'],
                $this->form['ukuran'],
                $this->form['berat'],
                $this->form['aroma'],
                $this->form['bentuk'],
                $this->form['rasa']
            ],
        ]);

        $this->alternatifModal = false;

        $this->emit('alternatifTableColumns');
    }

    public function editAlternatif()
    {
        $alternatif = ModelsAlternatif::find($this->id_alternatif);
        $alternatif->stok_id = $this->form['stok'];
        $alternatif->k_value = [
            $this->form['harga'],
            $this->form['ukuran'],
            $this->form['berat'],
            $this->form['aroma'],
            $this->form['bentuk'],
            $this->form['rasa']
        ];

        $alternatif->save();

        $this->id_alternatif = 0;
        $this->alternatifModal = false;

        $this->emit('alternatifTableColumns');
    }

    public function deleteAlternatif()
    {
        ModelsAlternatif::destroy($this->id_alternatif);
        $this->id_alternatif = 0;
        $this->deleteAlternatifModal = false;

        $this->emit('alternatifTableColumns');
    }

    public function render()
    {
        return view('livewire.alternatif');
    }
}
