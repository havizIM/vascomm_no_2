<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            Product::create([
                'name'         => 'Euodia',
                'price'        => 299000,
                'image'        => asset('/images/sample/product-1.png'),
                'activated_at' => Carbon::now()
            ]);
        }
    }
}
