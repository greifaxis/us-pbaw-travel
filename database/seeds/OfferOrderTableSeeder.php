<?php

use Illuminate\Database\Seeder;
use App\OfferOrder;

class OfferOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OfferOrder::class, 400)->create();
    }
}
