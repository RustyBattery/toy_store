<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses=['Await payment', 'Sent', 'Delivered', 'Order cancelled'];
        foreach ($statuses as $status){
            OrderStatus::query()->create(['name'=>$status],);
        }
        Order::factory(10)->create();
    }
}
