<?php

namespace Database\Seeders;

use App\Models\CurrencyRate;
use Illuminate\Database\Seeder;

class CurrencyRateSeeder extends Seeder
{
    public function run()
    {
        CurrencyRate::create([
            'date' => '2025-12-02',
            'eur' => 98.76,
            'usd' => 87.45,
            'gbp' => 112.34,
        ]);

        CurrencyRate::create([
            'date' => '2025-12-01',
            'eur' => 98.50,
            'usd' => 87.20,
            'gbp' => 112.10,
        ]);

        CurrencyRate::create([
            'date' => '2025-11-30',
            'eur' => 98.25,
            'usd' => 86.90,
            'gbp' => 111.80,
        ]);

        CurrencyRate::create([
            'date' => '2025-11-29',
            'eur' => 98.00,
            'usd' => 86.60,
            'gbp' => 111.50,
        ]);
    }
}
