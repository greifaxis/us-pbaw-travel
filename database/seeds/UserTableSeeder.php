<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

//        $role_user = Role::where('role','=','user')->first();
//        $role_admin  = Role::where('role','=','admin')->first();

        //Generic user account for testing
        $test_user = new User();
        $test_user->name = 'user';
        $test_user->email = 'user@example.com';
        $test_user->email_verified_at = now();
        $test_user->password = Hash::make('useruser');
        $test_user->firstName = 'John';
        $test_user->lastName = 'Doe';
        $test_user->phone = $faker->unique()->numerify('+48#########');
        $test_user->address = $faker->address;
        $test_user->role_id = 1;
        $test_user->remember_token = Str::random(10);
        $test_user->save();
//        $test_user->roles()->attach($role_user);

        //Generic admin account for testing
        $test_admin = new User();
        $test_admin->name = 'admin';
        $test_admin->email = 'admin@example.com';
        $test_admin->email_verified_at = now();
        $test_admin->password = Hash::make('adminadmin');
        $test_admin->firstName = 'Genghis';
        $test_admin->lastName = 'Khan';
        $test_admin->phone = $faker->unique()->numerify('+48#########');
        $test_admin->address = $faker->address;
        $test_admin->role_id = 2;
        $test_admin->remember_token = Str::random(10);
        $test_admin->save();
//        $test_admin->roles()->attach($role_admin);

        factory(App\User::class, 90)->create(['role_id' => 1]);
        factory(App\User::class, 8)->create(['company' => null, 'nipnum' => null, 'role_id' => 2]);
    }
}
