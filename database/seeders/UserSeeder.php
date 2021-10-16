<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

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
            'firstname' => 'Geofrey',
            'lastname' => 'Njavike',
            'role_id' => 1,
            'email' => 'geofreynjavike2017@gmail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
