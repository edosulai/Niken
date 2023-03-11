<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stok;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stok = [
            [
                'nama' => 'Durian Montong',
                'hrg_jual' => 49000,
                'stok' => 0,
                'unit' => 'Buah',
                'ket' => '',
            ], [
                'nama' => 'Durian Petruk',
                'hrg_jual' => 74000,
                'stok' => 0,
                'unit' => 'Buah',
                'ket' => '',
            ], [
                'nama' => 'Durian Mimang',
                'hrg_jual' => 28000,
                'stok' => 0,
                'unit' => 'Buah',
                'ket' => '',
            ], [
                'nama' => 'Durian Bokor',
                'hrg_jual' => 26000,
                'stok' => 0,
                'unit' => 'Buah',
                'ket' => '',
            ], [
                'nama' => 'Durian Musang King',
                'hrg_jual' => 112000,
                'stok' => 0,
                'unit' => 'Buah',
                'ket' => '',
            ], [
                'nama' => 'Durian Merah',
                'hrg_jual' => 54000,
                'stok' => 0,
                'unit' => 'Buah',
                'ket' => '',
            ], [
                'nama' => 'Durian Matahari',
                'hrg_jual' => 44000,
                'stok' => 0,
                'unit' => 'Buah',
                'ket' => '',
            ], [
                'nama' => 'Durian Ajimah',
                'hrg_jual' => 25000,
                'stok' => 0,
                'unit' => 'Buah',
                'ket' => '',
            ], [
                'nama' => 'Durian Medan',
                'hrg_jual' => 86000,
                'stok' => 0,
                'unit' => 'Buah',
                'ket' => '',
            ], [
                'nama' => 'Durian Bawor',
                'hrg_jual' => 107000,
                'stok' => 0,
                'unit' => 'Buah',
                'ket' => '',
            ],
        ];

        foreach ($stok as $key => $value) {
            Stok::factory(1)->create($value);
        }
    }
}
