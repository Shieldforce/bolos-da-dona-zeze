<?php

namespace Database\Seeders;

use App\Models\Cake;
use App\Models\CakeStock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CakesSeeders extends Seeder
{
    public function run()
    {
        $listCakes = [
            [
                'name'              => "Bolo de Cenoura",
                'weight'            => 1.500,
                'value'             => 75.00,
                'stock.amount'      => 25,
            ],
            [
                'name'              => "Bolo de Chocolate",
                'weight'            => 2.300,
                'value'             => 80.00,
                'stock.amount'      => 0,
            ],
            [
                'name'              => "Bolo de Abacate",
                'weight'            => 0.900,
                'value'             => 25.00,
                'stock.amount'      => 0,
            ],
        ];

        foreach ($listCakes as $cakeList) {
            $arrayCreateCakeStock = $cakeList;
            unset($cakeList["stock.amount"]);
            $cake = Cake::create($cakeList);
            CakeStock::create([
                "cake_id" => $cake->id,
                "amount"  => $arrayCreateCakeStock["stock.amount"],
            ]);
        }
    }
}
