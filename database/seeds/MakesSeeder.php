<?php

use Illuminate\Database\Seeder;

class MakesSeeder extends Seeder
{
    private $makes = [
        'Skoda',
        'Citroen'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->makes as $make) {
            \App\Make::create([
                'name' => $make
            ]);
        }
    }
}
