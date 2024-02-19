<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            'name' => "Iphone 13",
            'descriptio' => "Smart Phone by Apple",
            'price' => 980
        ]);

        DB::table('products')->insert([
            'name' => "Ipad Pro 11",
            'descriptio' => "Tablet by Apple",
            'price' => 850
        ]);
        DB::table('products')->insert([
            'name' => "Apple Watch",
            'descriptio' => "Watch by Apple",
            'price' => 540
        ]);
    }
}
