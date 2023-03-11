<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inclusion;
use App\Models\Stok;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class InclusionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $masuk = [
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Mimang')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 63,
                'created_at' => Carbon::create(2022, 2, 1),
                'updated_at' => Carbon::create(2022, 2, 1)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Mimang')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 62,
                'created_at' => Carbon::create(2022, 2, 2),
                'updated_at' => Carbon::create(2022, 2, 2)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Petruk')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 63,
                'created_at' => Carbon::create(2022, 2, 3),
                'updated_at' => Carbon::create(2022, 2, 3)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Mimang')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 63,
                'created_at' => Carbon::create(2022, 2, 4),
                'updated_at' => Carbon::create(2022, 2, 4)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Bokor')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 64,
                'created_at' => Carbon::create(2022, 2, 5),
                'updated_at' => Carbon::create(2022, 2, 5)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Musang King')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 59,
                'created_at' => Carbon::create(2022, 2, 6),
                'updated_at' => Carbon::create(2022, 2, 6)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Mimang')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 65,
                'created_at' => Carbon::create(2022, 2, 7),
                'updated_at' => Carbon::create(2022, 2, 7)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Merah')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 59,
                'created_at' => Carbon::create(2022, 2, 8),
                'updated_at' => Carbon::create(2022, 2, 8)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Matahari')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 59,
                'created_at' => Carbon::create(2022, 2, 9),
                'updated_at' => Carbon::create(2022, 2, 9)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Ajimah')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 62,
                'created_at' => Carbon::create(2022, 2, 10),
                'updated_at' => Carbon::create(2022, 2, 10)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Montong')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 64,
                'created_at' => Carbon::create(2022, 2, 11),
                'updated_at' => Carbon::create(2022, 2, 11)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Medan')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 60,
                'created_at' => Carbon::create(2022, 2, 12),
                'updated_at' => Carbon::create(2022, 2, 12)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Mimang')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 59,
                'created_at' => Carbon::create(2022, 2, 13),
                'updated_at' => Carbon::create(2022, 2, 13)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Petruk')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 63,
                'created_at' => Carbon::create(2022, 2, 14),
                'updated_at' => Carbon::create(2022, 2, 14)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Montong')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 61,
                'created_at' => Carbon::create(2022, 2, 15),
                'updated_at' => Carbon::create(2022, 2, 15)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Bawor')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 59,
                'created_at' => Carbon::create(2022, 2, 16),
                'updated_at' => Carbon::create(2022, 2, 16)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Merah')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 59,
                'created_at' => Carbon::create(2022, 2, 17),
                'updated_at' => Carbon::create(2022, 2, 17)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Ajimah')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 65,
                'created_at' => Carbon::create(2022, 2, 18),
                'updated_at' => Carbon::create(2022, 2, 18)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Ajimah')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 65,
                'created_at' => Carbon::create(2022, 2, 19),
                'updated_at' => Carbon::create(2022, 2, 19)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Ajimah')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 63,
                'created_at' => Carbon::create(2022, 2, 20),
                'updated_at' => Carbon::create(2022, 2, 20)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Montong')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 62,
                'created_at' => Carbon::create(2022, 2, 21),
                'updated_at' => Carbon::create(2022, 2, 21)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Petruk')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 58,
                'created_at' => Carbon::create(2022, 2, 22),
                'updated_at' => Carbon::create(2022, 2, 22)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Bawor')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 65,
                'created_at' => Carbon::create(2022, 2, 23),
                'updated_at' => Carbon::create(2022, 2, 23)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Musang King')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 64,
                'created_at' => Carbon::create(2022, 2, 24),
                'updated_at' => Carbon::create(2022, 2, 24)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Bokor')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 58,
                'created_at' => Carbon::create(2022, 2, 25),
                'updated_at' => Carbon::create(2022, 2, 25)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Matahari')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 61,
                'created_at' => Carbon::create(2022, 2, 26),
                'updated_at' => Carbon::create(2022, 2, 26)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Ajimah')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 63,
                'created_at' => Carbon::create(2022, 2, 27),
                'updated_at' => Carbon::create(2022, 2, 27)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Medan')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 58,
                'created_at' => Carbon::create(2022, 2, 28),
                'updated_at' => Carbon::create(2022, 2, 28)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Musang King')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 62,
                'created_at' => Carbon::create(2022, 3, 1),
                'updated_at' => Carbon::create(2022, 3, 1)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Montong')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 61,
                'created_at' => Carbon::create(2022, 3, 2),
                'updated_at' => Carbon::create(2022, 3, 2)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Merah')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 65,
                'created_at' => Carbon::create(2022, 3, 3),
                'updated_at' => Carbon::create(2022, 3, 3)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Musang King')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 64,
                'created_at' => Carbon::create(2022, 3, 4),
                'updated_at' => Carbon::create(2022, 3, 4)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Mimang')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 60,
                'created_at' => Carbon::create(2022, 3, 5),
                'updated_at' => Carbon::create(2022, 3, 5)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Matahari')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 63,
                'created_at' => Carbon::create(2022, 3, 6),
                'updated_at' => Carbon::create(2022, 3, 6)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Mimang')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 59,
                'created_at' => Carbon::create(2022, 3, 7),
                'updated_at' => Carbon::create(2022, 3, 7)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Ajimah')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 65,
                'created_at' => Carbon::create(2022, 3, 8),
                'updated_at' => Carbon::create(2022, 3, 8)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Ajimah')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 60,
                'created_at' => Carbon::create(2022, 3, 9),
                'updated_at' => Carbon::create(2022, 3, 9)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Matahari')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 59,
                'created_at' => Carbon::create(2022, 3, 10),
                'updated_at' => Carbon::create(2022, 3, 10)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Bokor')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 61,
                'created_at' => Carbon::create(2022, 3, 11),
                'updated_at' => Carbon::create(2022, 3, 11)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Ajimah')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 59,
                'created_at' => Carbon::create(2022, 3, 12),
                'updated_at' => Carbon::create(2022, 3, 12)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Merah')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 62,
                'created_at' => Carbon::create(2022, 3, 13),
                'updated_at' => Carbon::create(2022, 3, 13)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Matahari')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 61,
                'created_at' => Carbon::create(2022, 3, 14),
                'updated_at' => Carbon::create(2022, 3, 14)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Medan')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 58,
                'created_at' => Carbon::create(2022, 3, 15),
                'updated_at' => Carbon::create(2022, 3, 15)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Montong')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 58,
                'created_at' => Carbon::create(2022, 3, 16),
                'updated_at' => Carbon::create(2022, 3, 16)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Musang King')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 59,
                'created_at' => Carbon::create(2022, 3, 17),
                'updated_at' => Carbon::create(2022, 3, 17)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Petruk')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 62,
                'created_at' => Carbon::create(2022, 3, 18),
                'updated_at' => Carbon::create(2022, 3, 18)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Bawor')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 62,
                'created_at' => Carbon::create(2022, 3, 19),
                'updated_at' => Carbon::create(2022, 3, 19)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Ajimah')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 65,
                'created_at' => Carbon::create(2022, 3, 20),
                'updated_at' => Carbon::create(2022, 3, 20)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Bokor')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 59,
                'created_at' => Carbon::create(2022, 3, 21),
                'updated_at' => Carbon::create(2022, 3, 21)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Bawor')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 58,
                'created_at' => Carbon::create(2022, 3, 22),
                'updated_at' => Carbon::create(2022, 3, 22)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Bawor')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 59,
                'created_at' => Carbon::create(2022, 3, 23),
                'updated_at' => Carbon::create(2022, 3, 23)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Merah')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 64,
                'created_at' => Carbon::create(2022, 3, 24),
                'updated_at' => Carbon::create(2022, 3, 24)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Bokor')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 63,
                'created_at' => Carbon::create(2022, 3, 25),
                'updated_at' => Carbon::create(2022, 3, 25)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Petruk')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 60,
                'created_at' => Carbon::create(2022, 3, 26),
                'updated_at' => Carbon::create(2022, 3, 26)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Musang King')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 61,
                'created_at' => Carbon::create(2022, 3, 27),
                'updated_at' => Carbon::create(2022, 3, 27)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Medan')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 60,
                'created_at' => Carbon::create(2022, 3, 28),
                'updated_at' => Carbon::create(2022, 3, 28)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Musang King')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 60,
                'created_at' => Carbon::create(2022, 3, 29),
                'updated_at' => Carbon::create(2022, 3, 29)
            ],
            [
                'stok_data'=> Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->where('nama', 'Durian Musang King')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->first()
                    ->toArray(),
                'jumlah' => 61,
                'created_at' => Carbon::create(2022, 3, 30),
                'updated_at' => Carbon::create(2022, 3, 30)
            ],
        ];

        foreach ($masuk as $key => $value) {
            Inclusion::factory(1)->create($value);
        }
    }
}
