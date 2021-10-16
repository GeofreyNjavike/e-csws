<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ObjectivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('objectives')->insert([
            [
                'fileobjective' => 'Request for payment'
            ],
            [
                'fileobjective' => 'Materials'
            ],
            [
                'fileobjective' => 'Other..'
            ]
        ]);
    }
}
