<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([
            [
                'id' => Str::orderedUuid(),
                'nama' => 'Pending',
                'icon' => 'fas fa-hourglass-half',
                'created_at' => Carbon::now()->subSecond(9),
                'updated_at' => Carbon::now()->subSecond(9)
            ], [
                'id' => Str::orderedUuid(),
                'nama' => 'Accepted',
                'icon' => 'fa fa-check',
                'created_at' => Carbon::now()->subSecond(7),
                'updated_at' => Carbon::now()->subSecond(7)
            ], [
                'id' => Str::orderedUuid(),
                'nama' => 'Rejected',
                'icon' => 'fas fa-ban',
                'created_at' => Carbon::now()->subSecond(2),
                'updated_at' => Carbon::now()->subSecond(2)
            ], [
                'id' => Str::orderedUuid(),
                'nama' => 'Canceled',
                'icon' => 'fas fa-window-close',
                'created_at' => Carbon::now()->subSecond(1),
                'updated_at' => Carbon::now()->subSecond(1)
            ],
        ]);
    }
}
