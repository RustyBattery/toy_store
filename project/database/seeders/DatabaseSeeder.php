<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductManufacturer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        User::query()->create([
            'name' => 'mister admin',
            'email' => 'admin@gmail.com',
            'role'=>'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $this->call(ProductSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(OrderSeeder::class);
    }
}
