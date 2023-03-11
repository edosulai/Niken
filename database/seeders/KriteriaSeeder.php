<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Kriteria::factory()
            ->count(6)
            ->state(new Sequence(
                [
                    'nama' => 'Harga',
                    'kepentingan' => 5,
                    'tipe' => 'cost'
                ], [
                    'nama' => 'Ukuran',
                    'kepentingan' => 3,
                    'tipe' => 'benefit'
                ], [
                    'nama' => 'Berat',
                    'kepentingan' => 4,
                    'tipe' => 'benefit'
                ], [
                    'nama' => 'Aroma',
                    'kepentingan' => 3,
                    'tipe' => 'benefit'
                ], [
                    'nama' => 'Bentuk',
                    'kepentingan' => 2,
                    'tipe' => 'benefit'
                ], [
                    'nama' => 'Rasa',
                    'kepentingan' => 2,
                    'tipe' => 'benefit'
                ],
            ))->create();
    }
}
