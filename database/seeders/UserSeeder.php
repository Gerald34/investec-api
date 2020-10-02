<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            [
                'first_name' => 'Arno',
                'last_email' => 'Le Grand',
                'email' => 'arno@investec.co.za',
                'password' => Hash::make('arno'),
            ],
            [
                'first_name' => 'Julia',
                'last_email' => 'Kaleta',
                'email' => 'julia@investec.co.za',
                'password' => Hash::make('julia'),
            ],
            [
                'first_name' => 'Jody',
                'last_email' => 'Teren',
                'email' => 'jody@investec.co.za',
                'password' => Hash::make('jody'),
            ],
            [
                'first_name' => 'Gerald',
                'last_email' => 'Mathabela',
                'email' => 'code45dev@gmail.com',
                'password' => Hash::make('gerald'),
            ]
        ]);
    }
}
