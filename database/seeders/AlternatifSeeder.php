<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use App\Models\Stok;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Alternatif::factory()
            ->count(10)
            ->state(new Sequence(
                [
                    'stok_id' => Stok::where('nama', 'Durian Montong')->first()->id,
                    'k_value' => [2, 3, 2, 1, 2, 2], //
                ], [
                    'stok_id' => Stok::where('nama', 'Durian Petruk')->first()->id,
                    'k_value' => [3, 2, 2, 3, 3, 3], //
                ], [
                    'stok_id' => Stok::where('nama', 'Durian Bawor')->first()->id,
                    'k_value' => [4, 3, 2, 3, 1, 2], //
                ], [
                    'stok_id' => Stok::where('nama', 'Durian Musang King')->first()->id,
                    'k_value' => [4, 2, 2, 3, 3, 3], //
                ], [
                    'stok_id' => Stok::where('nama', 'Durian Medan')->first()->id,
                    'k_value' => [3, 2, 2, 2, 2, 2], //
                ], [
                    'stok_id' => Stok::where('nama', 'Durian Merah')->first()->id,
                    'k_value' => [2, 2, 2, 2, 2, 1], //
                ], [
                    'stok_id' => Stok::where('nama', 'Durian Bokor')->first()->id,
                    'k_value' => [1, 1, 2, 3, 3, 2], //
                ], [
                    'stok_id' => Stok::where('nama', 'Durian Matahari')->first()->id,
                    'k_value' => [2, 3, 2, 2, 1, 2], //
                ], [
                    'stok_id' => Stok::where('nama', 'Durian Mimang')->first()->id,
                    'k_value' => [1, 1, 3, 3, 3, 2], //
                ], [
                    'stok_id' => Stok::where('nama', 'Durian Ajimah')->first()->id,
                    'k_value' => [1, 2, 2, 2, 2, 1], //
                ],
            ))->create();
    }
}
