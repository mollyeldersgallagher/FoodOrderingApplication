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


          $this->call(RolesTableSeeder::class);
          $this->call(UsersTableSeeder::class);
          $this->call(OptionsTableSeeder::class);
          $this->call(DietsTableSeeder::class);
          $this->call(FoodsTableSeeder::class);
          $this->call(OrdersTableSeeder::class);
          $this->call(CreditCardsTableSeeder::class);
          $this->call(CustomersTableSeeder::class);



    }
}
