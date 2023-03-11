<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Muhammad Rajiv Fachrezy',
            'email' => 'admin@localhost.com',
            'password' => bcrypt('password'),
        ]);
        $admin->markEmailAsVerified();
        $admin->assignRole('admin');



        $karyawan = User::create([
            'name' => 'karin',
            'email' => 'karin@localhost.com',
            'password' => bcrypt('password'),
        ]);
        $karyawan->markEmailAsVerified();
        $karyawan->assignRole('karyawan');



        $pemasok = User::create([
            'name' => 'pemdur',
            'email' => 'pemdur@localhost.com',
            'password' => bcrypt('password'),
        ]);
        $pemasok->markEmailAsVerified();
        $pemasok->assignRole('pemasok');



        $pemasok = User::create([
            'name' => 'bandar',
            'email' => 'bandar@localhost.com',
            'password' => bcrypt('password'),
        ]);
        $pemasok->markEmailAsVerified();
        $pemasok->assignRole('pemasok');



        $user = User::create([
            'name' => 'Edo Sulaiman',
            'email' => 'ngufeel@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $user->markEmailAsVerified();
        $user->assignRole('user');
    }
}
