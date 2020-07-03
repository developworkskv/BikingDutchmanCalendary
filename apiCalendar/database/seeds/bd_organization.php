<?php

use Illuminate\Database\Seeder;

class bd_organization extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bd_organization')->insert([
            'name' => 'Biking Dutchman Mountain',
            'isActive' => true,
            'description1' => true,
            'description2' => true,
            'status' => true
        ]);
    }
}
