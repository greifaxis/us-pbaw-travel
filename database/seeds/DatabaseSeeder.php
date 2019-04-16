<?php

use Illuminate\Database\Seeder;
use App\User;
use App\RoleUser;

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

        Eloquent::reguard();
    }
}
