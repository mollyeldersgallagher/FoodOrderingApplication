<?php

use Illuminate\Database\Seeder;
use App\Food;
class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $food = new Food();
      $food->name = 'Chicken';
      $food->description = 'An Administrator';
      $food->type = 'meat';
      $food->allergies = 'An Administrator';
      $food->ingredients = 'An Administrator';
      $food->cost = 10.00;
      $food->save();

      $food = new Food();
      $food->name = 'Beef';
      $food->description = 'An Administrator';
      $food->type = 'meat';
      $food->allergies = 'An Administrator';
      $food->ingredients = 'An Administrator';
      $food->cost = 12.90;
      $food->save();

      $food = new Food();
      $food->name = 'Plant';
      $food->description = 'An Administrator';
      $food->type = 'vegan';
      $food->allergies = 'An Administrator';
      $food->ingredients = 'An Administrator';
      $food->cost = 6.50;
      $food->save();

      $food = new Food();
      $food->name = 'Herb';
      $food->description = 'An Administrator';
      $food->type = 'vegan';
      $food->allergies = 'An Administrator';
      $food->ingredients = 'An Administrator';
      $food->cost = 3.90;
      $food->save();

      $food = new Food();
      $food->name = 'Veggie';
      $food->description = 'An Administrator';
      $food->type = 'vegetarian';
      $food->allergies = 'An Administrator';
      $food->ingredients = 'An Administrator';
      $food->cost = 9.10;
      $food->save();

      $food = new Food();
      $food->name = 'Veg';
      $food->description = 'An Administrator';
      $food->type = 'vegetarian';
      $food->allergies = 'An Administrator';
      $food->ingredients = 'An Administrator';
      $food->cost = 6.50;
      $food->save();

    }
}
