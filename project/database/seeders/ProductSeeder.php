<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductManufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['soft toys', 'for the little ones','board games','for creativity','collectible toys'];
        foreach ($categories as $category){
            ProductCategory::query()->create(['name'=>$category]);
        }
        $manufacturers=['manufacturer1', 'manufacturer2','manufacturer3'];
        foreach ($manufacturers as $manufacturer){
            ProductManufacturer::query()->create(['name'=>$manufacturer],);
        }
        Product::factory(20)->create();
    }
}
