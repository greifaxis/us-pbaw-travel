<?php

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
        Eloquent::unguard();

        $this->call(RoleTableSeeder::class);
        $this->call(HotelTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(OfferTableSeeder::class);
        $this->call(OfferOrderTableSeeder::class);
        $this->call(OrderTableSeeder::class);

        Eloquent::reguard();
    }
}
