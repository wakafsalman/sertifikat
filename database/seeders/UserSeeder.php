<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

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
            'nama' => 'Administrator',
            'email' => 'admin@admin.com',
            'roles' => 'Super Admin',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60),
        ]);
    }
}
