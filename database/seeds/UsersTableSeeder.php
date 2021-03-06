<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin  = Role::where("name", "admin")->first();

        $admin = new User();
        $admin->name = "testAdmin";
        $admin->email = "admin@test.com";
        $admin->password = bcrypt("test");
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
