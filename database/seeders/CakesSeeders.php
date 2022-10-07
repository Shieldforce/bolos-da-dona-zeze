<?php

namespace Database\Seeders;

use App\Models\Cake;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CakesSeeders extends Seeder
{
    public function run()
    {
        $listCakes = [
            [
                'name'        => "Bolo de Cenoura",
                'weight'      => 1.500,
                'value'       => 75.00,
                'amount'      => 25,
            ],
            [
                'name'        => "Bolo de Chocolate",
                'weight'      => 2.300,
                'value'       => 80.00,
                'amount'      => 35,
            ],
            [
                'name'        => "Bolo de Abacate",
                'weight'      => 0.900,
                'value'       => 25.00,
                'amount'      => 90,
            ],
        ];

        foreach ($listCakes as $cake) {
            Cake::create($cake);
        }
    }
}
