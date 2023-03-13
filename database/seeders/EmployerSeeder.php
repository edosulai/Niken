<?php

namespace Database\Seeders;

use App\Imports\EmployersImport;
use App\Models\Employer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Employer::factory(3)->create();
        Excel::import(new EmployersImport,'data_mentah.xlsx');
    }
}
