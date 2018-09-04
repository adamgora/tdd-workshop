<?php

use App\Car;
use App\Make;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    private $cars = [
        [
            'make' => 'Skoda',
            'model' => 'Fabia',
            'registration_number' => 'SC 42562'
        ],
        [
            'make' => 'Skoda',
            'model' => 'Rapid',
            'registration_number' => 'SC 11987'
        ],
        [
            'make' => 'Citroen',
            'model' => 'C3',
            'registration_number' => 'SC 56758'
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->cars as $car) {
            Car::create([
                'make_id' => Make::where('name', $car['make'])->first()->id,
                'model' => $car['model'],
                'registration_number' => $car['registration_number']
            ]);
        }

    }
}
