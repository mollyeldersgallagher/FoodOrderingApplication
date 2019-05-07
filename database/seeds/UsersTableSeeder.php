<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      $role_admin = Role::where('name', 'admin')->first();
      $role_user = Role::where('name', 'user')->first();

      $admin = new User();
      $admin->name = 'Mary';
      $admin->email = 'mary@example.com';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $user = new User();
      $user->name = 'Joe';
      $user->email = 'joe@example.com';
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_user);

      $user = new User();
      $user->name = 'Anne';
      $user->email = 'anne@example.com';
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_user);
    }
}
