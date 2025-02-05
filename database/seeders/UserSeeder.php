<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([

            [
                'name' => 'Ram Krishna',
                'email' => 'admin@school.com',
                'password' => Hash::make('admin123'),
            ],
            // [
            //     'name' => 'Ravi Teja',
            //     'email' => 'ravi@nexus.com',
            //     'password' => Hash::make('channel123'),
            // ],
            // [
            //     'name' => 'Jr NTR',
            //     'email' => 'store@nexus.com',
            //     'password' => bcrypt('store123'),
            // ],
        ]);

    }
}
