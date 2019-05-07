<?php

use Illuminate\Database\Seeder;
use App\Option;
class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $option = new Option();
      $option->name = 'Burrito';
      $option->image = 'images/Burrito.png';
      $option->cost = 2.0;
      $option->save();

      $option = new Option();
      $option->name = 'Wrap';
      $option->image = 'images/Burrito.png';
      $option->cost = 1.0;
      $option->save();

      $option = new Option();
      $option->name = 'Bowl';
      $option->image = 'images/Burrito.png';
      $option->cost = 2.00;
      $option->save();

      $option = new Option();
      $option->name = 'Sandwich';
      $option->image = 'images/Burrito.png';
      $option->cost = 2.0;
      $option->save();

      $option = new Option();
      $option->name = 'Soup';
      $option->image = 'images/Burrito.png';
      $option->cost = 2.0;
      $option->save();

      $option = new Option();
      $option->name = 'Salad';
      $option->image = 'images/Burrito.png';
      $option->cost = 2.0;
      $option->save();
    }
}
