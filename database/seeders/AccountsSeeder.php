<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            [
                'id' => 1,
                'account_number' => '8707823434',
                'status' => 1
            ],
            [
                'id' => 2,
                'account_number' => '3456783453',
                'status' => 0
            ],
            [
                'id' => 3,
                'account_number' => '6734579873',
                'status' => 1
            ],
            [
                'id' => 4,
                'account_number' => '7438756393',
                'status' => 0
            ]
        ]);
    }
}
