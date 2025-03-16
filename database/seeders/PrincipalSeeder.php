<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PrincipalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $principals = [
            [
                'school_id' => 1,
                'name'      => 'Ravi Kumar',
                'email'     => 'ravik@schoolpro.com',
                'phone'     => '9876543210',
                'username'  => 'ravikumar',
                'password'  => Hash::make('SecurePwd1'),
            ],
            [
                'school_id' => 2,
                'name'      => 'Sita Reddy',
                'email'     => 'sitareddy@schoolpro.com',
                'phone'     => '8765432109',
                'username'  => 'sitareddy',
                'password'  => Hash::make('SecurePwd2'),
            ],
            [
                'school_id' => 3,
                'name'      => 'Ramesh Babu',
                'email'     => 'ramesh.babu@schoolpro.com',
                'phone'     => '7654321098',
                'username'  => 'rameshbabu',
                'password'  => Hash::make('SecurePwd3'),
            ],
            [
                'school_id' => 4,
                'name'      => 'Priya Sharma',
                'email'     => 'priya.sharma@schoolpro.com',
                'phone'     => '6543210987',
                'username'  => 'priyasharma',
                'password'  => Hash::make('SecurePwd4'),
            ],
            [
                'school_id' => 5,
                'name'      => 'Anil Varma',
                'email'     => 'anil.varma@schoolpro.com',
                'phone'     => '5432109876',
                'username'  => 'anilvarma',
                'password'  => Hash::make('SecurePwd5'),
            ],
            [
                'school_id' => 6,
                'name'      => 'Sunita Devi',
                'email'     => 'sunita.devi@schoolpro.com',
                'phone'     => '4321098765',
                'username'  => 'sunitadevi',
                'password'  => Hash::make('SecurePwd6'),
            ],
            [
                'school_id' => 7,
                'name'      => 'Mohan Rao',
                'email'     => 'mohan.rao@schoolpro.com',
                'phone'     => '3210987654',
                'username'  => 'mohanrao',
                'password'  => Hash::make('SecurePwd7'),
            ],
            [
                'school_id' => 8,
                'name'      => 'Lakshmi Narayana',
                'email'     => 'lakshmi.narayana@schoolpro.com',
                'phone'     => '2109876543',
                'username'  => 'lakshminarayana',
                'password'  => Hash::make('SecurePwd8'),
            ],
            [
                'school_id' => 9,
                'name'      => 'Kavita Sharma',
                'email'     => 'kavita.sharma@schoolpro.com',
                'phone'     => '1098765432',
                'username'  => 'kavitasharma',
                'password'  => Hash::make('SecurePwd9'),
            ],
            [
                'school_id' => 10,
                'name'      => 'Rajesh Kumar',
                'email'     => 'rajesh.kumar@schoolpro.com',
                'phone'     => '0987654321',
                'username'  => 'rajeshkumar',
                'password'  => Hash::make('SecurePwd10'),
            ],
        ];

        foreach ($principals as $principal) {
            \App\Models\Principal::create($principal);
        }

    }
}
