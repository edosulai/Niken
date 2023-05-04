<?php

namespace Database\Seeders;

use App\Imports\DataMentah;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new DataMentah, 'data_mentah.xlsx');
    }
}
