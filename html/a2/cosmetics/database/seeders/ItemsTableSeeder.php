<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => "Hoola Matte Bronzer",
            'price' => 29,
            'description' => 'Formulation: Pressed Powder',
            'manufacture_name' => 'Benefit',
            'URL' => 'https://www.sephora.com.au/products/benefit-cosmetics-hoola-glow-bronzer/v/default'
        ]);
        DB::table('items')->insert([
            'name' => "Shape Tape Contour Concealer",
            'price' => 42,
            'description' => 'Finish: Matte, Radiant, Satin',
            'manufacture_name' => 'Tarte',
        ]);
        DB::table('items')->insert([
            'name' => "Your Skin But Better",
            'price' => 63,
            'description' => 'Finish: Radiant',
            'manufacture_name' => 'It cosmetics',
        ]);
        DB::table('items')->insert([
            'name' => "Stay Vulnerable Melting Blush",
            'price' => 42,
            'description' => 'Formulation: Cream, Liquid',
            'manufacture_name' => 'Fenty Beauty',
        ]);
        DB::table('items')->insert([
            'name' => "Face and Body Foundation",
            'price' => 70,
            'description' => 'Finish: Natural',
            'manufacture_name' => 'Dior',
        ]);
        DB::table('items')->insert([
            'name' => "Glow Face Palette",
            'price' => 76,
            'description' => 'Finish: Radiant',
            'manufacture_name' => 'Dior',
        ]);
        DB::table('items')->insert([
            'name' => "Lip Paint",
            'price' => 39,
            'description' => 'Finish: Matte, Natural',
            'manufacture_name' => 'Fenty Beauty',
        ]);
    }
}
