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
            'user_id' => 1,
            'URL' => 'https://www.sephora.com.au/products/benefit-cosmetics-hoola-glow-bronzer/v/default'
        ]);
        DB::table('items')->insert([
            'name' => "Shape Tape Contour Concealer",
            'price' => 42,
            'description' => 'Finish: Matte, Radiant, Satin',
            'manufacture_name' => 'Tarte',
            'user_id' => '2',
            'URL' =>'https://www.sephora.com.au/products/tarte-shape-tape-contour-concealer/v/8b-porcelain-beige',
        ]);
        DB::table('items')->insert([
            'name' => "Your Skin But Better",
            'price' => 63,
            'description' => 'Finish: Radiant',
            'manufacture_name' => 'It cosmetics',
            'user_id' => '3',
        ]);
        DB::table('items')->insert([
            'name' => "Stay Vulnerable Melting Blush",
            'price' => 42,
            'description' => 'Formulation: Cream, Liquid',
            'manufacture_name' => 'Fenty Beauty',
            'user_id' => '4',
        ]);
        DB::table('items')->insert([
            'name' => "Face and Body Foundation",
            'price' => 70,
            'description' => 'Finish: Natural',
            'manufacture_name' => 'Dior',
            'user_id' => '5',
        ]);
        DB::table('items')->insert([
            'name' => "Glow Face Palette",
            'price' => 76,
            'description' => 'Finish: Radiant',
            'manufacture_name' => 'Dior',
            'user_id' => '6',
        ]);
        DB::table('items')->insert([
            'name' => "Lip Paint",
            'price' => 39,
            'description' => 'Finish: Matte, Natural',
            'manufacture_name' => 'Fenty Beauty',
            'user_id' => '7',
        ]);
    }
}
