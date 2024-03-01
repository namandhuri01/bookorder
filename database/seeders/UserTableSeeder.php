<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
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
                'id' => 1,
                'name' => 'Super Admin',
                'email'     => 'superadmin@yopmail.com',
                'password' => Hash::make('superadmin@1234'),
                'role_id'   => 1,
            ],
            [
                'id' => 2,
                'name' => 'User',
                'email'     => 'user@yopmail.com',
                'password' => Hash::make('user@1234'),
                'role_id'   => 2,
            ],
            [
                'id' => 3,
                'name' => 'Customer',
                'email'     => 'customer@gmail.com',
                'password' => Hash::make('customer@1234'),
                'role_id'   => 2,
            ],
        ]);
    }
}
