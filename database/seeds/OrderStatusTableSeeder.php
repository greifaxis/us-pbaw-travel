<?php

use Illuminate\Database\Seeder;
use App\OrderStatus;


class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Basket
        $basket = new OrderStatus();
        $basket->status = 'Basket';
        $basket->save();
        //Pending
        $pending = new OrderStatus();
        $pending->status = 'Pending';
        $pending->save();
        //Completed
        $completed = new OrderStatus();
        $completed->status = 'Completed';
        $completed->save();
        //Failed
        $failed = new OrderStatus();
        $failed->status = 'Failed';
        $failed->save();
        //Rejected
        $rejected = new OrderStatus();
        $rejected->status = 'Rejected';
        $rejected->save();
        //Refunded
        $refunded = new OrderStatus();
        $refunded->status = 'Refunded';
        $refunded->save();
    }
}
