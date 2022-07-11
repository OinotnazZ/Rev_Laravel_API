<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries =[
            ['name' => 'Portugal'],
            ['name' => 'Espanha'],
            ['name' => 'França'],
            ['name' => 'Polónia']
        ];

        for ($i = 0; $i < 4; $i++) {
            \DB::table('Countries')->insert([
                'name' => $countries[$i]['name'],
            ]);
        }
    }
}
