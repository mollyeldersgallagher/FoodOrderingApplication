<?php

use Illuminate\Database\Seeder;
use App\Diet;
class DietsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $diet = new Diet();
      $diet->name = 'Meat';
      $diet->image = 'images/Meat.png';
      $diet->save();

      $diet = new Diet();
      $diet->name = 'Vegan';
      $diet->image = 'images/Vegan.png';
      $diet->save();

      $diet = new Diet();
      $diet->name = 'Vegetarian';
      $diet->image = 'images/Vegetarian.png';
      $diet->save();
    }
}
