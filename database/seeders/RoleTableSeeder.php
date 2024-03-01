<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'Super-Admin',
                'description' => 'super-admin can do any things'
            ],
            [
                'id' => 2,
                'name'  => 'Customer',
                'description' => 'customer can see books and purchase book etc etc.'
            ]
        ]);
    }
}
