<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stream;

class StreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $streams = ['APSB TM', 'APSB EM', 'CBSE', 'ICSE'];

        foreach ($streams as $name) {
            Stream::create(['name' => $name]);
        }

    }
}
