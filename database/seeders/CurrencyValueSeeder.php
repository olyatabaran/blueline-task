<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CurrencyValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            [
                'value' => 'Euro',
                'shortened_value' => 'eur',
            ],
            [
                'value' => 'Dollar',
                'shortened_value' => 'usd',
            ],
            [
                'value' => 'Lev',
                'shortened_value' => 'bjn',
            ],
            [
                'value' => 'Yen',
                'shortened_value' => 'jpy',
            ],
            [
                'value' => 'Leu',
                'shortened_value' => 'ron',
            ],
            [
                'value' => 'Ruble',
                'shortened_value' => 'rub',
            ]
        ]);
    }
}
