<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        Fluent seeding
        /*       \App\Role::insert([
                   'role' => 'admin',
                   'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                   'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
               ]);

               \App\Role::insert([
                   'role' => 'user',
                   'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                   'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
               ]);*/

//          Eloquent seeding
        $role_user = new Role();
        $role_user->role = 'user';
        $role_user->description = 'Użytkownik';
        $role_user->save();

        $role_admin = new Role();
        $role_admin->role = 'admin';
        $role_admin->description = 'Administrator';
        $role_admin->save();
    }
}
