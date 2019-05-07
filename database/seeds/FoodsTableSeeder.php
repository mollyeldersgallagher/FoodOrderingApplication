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
       // seeders for the database to plug content in to website, without having to add it manually - creates a new food and goes through the variables and adds content and adds it to the correct
       // options list by using the diet id and assigning it to the correct list of options.
       $food = new Food();
       $food->name = 'Chicken';
       $food->description = 'Crispy chicken marinated in spices with cheddar cheese, lettuce and tomato';
       $food->diet_id = 1;
       $food->allergies = 'Dairy, Wheat, Meat';
       $food->ingredients = 'Chicken, Lettuce, Tomato, Butter, Mayonnaise, Paprika, Cheese';
       $food->cost = 10.00;
       $food->image = 'images/sandwich.jpg';
       $food->save();

       $food = new Food();
       $food->name = 'Pork';
       $food->description = 'Crackling prok roasted in spices with emmental cheese, lettuce and tomato';
       $food->diet_id = 1;
       $food->allergies = 'Dairy, Wheat, Meat';
       $food->ingredients = 'Pork, Lettuce, Tomato, Butter, Mayonnaise, Paprika, Cheese';
       $food->cost = 10.00;
       $food->image = 'images/sandwich.jpg';
       $food->save();

       $food = new Food();
       $food->name = 'Beef';
       $food->description = 'Barbocoa beef steeped in spices with mozzarella cheese, rocket and tomato';
       $food->diet_id = 1;
       $food->allergies = 'Dairy, Wheat, Meat';
       $food->ingredients = 'Beef, Garlic, Mozzarella cheese, Rocket, Cheese';
       $food->cost = 12.90;
       $food->image = 'images/sandwich.jpg';
       $food->save();

       $food = new Food();
       $food->name = 'Turkey';
       $food->description = 'Grilled turkey with stuffing, rocket and mayo';
       $food->diet_id = 1;
       $food->allergies = 'Dairy, Wheat, Meat';
       $food->ingredients = 'Turkey, Stuffing, Butter, Mayo';
       $food->cost = 12.90;
       $food->image = 'images/sandwich.jpg';
       $food->save();

       $food = new Food();
       $food->name = 'Tofu';
       $food->description = 'Roasted Vegetable and Tofu, with hummus and basil pesto';
       $food->diet_id = 2;
       $food->allergies = 'Beans, Nuts, Wheat';
       $food->ingredients = 'Aubergine, Tomato, Pepper, Tofu, Chickpeas, Pine Nuts, Spinach';
       $food->cost = 6.50;
       $food->image = 'images/sandwich.jpg';
       $food->save();

       $food = new Food();
       $food->name = 'Chickpea';
       $food->description = 'Smashed chickpea, avocado, and lemon dressing';
       $food->diet_id = 2;
       $food->allergies = 'Soybeans, Citrus, Wheat';
       $food->ingredients = 'Chickpeas, Cilantro, Avocado, Lemon';
       $food->cost = 6.50;
       $food->image = 'images/sandwich.jpg';
       $food->save();

       $food = new Food();
       $food->name = 'BLT';
       $food->description = 'Vegan bacon, lettuce, avocado and tomato';
       $food->diet_id = 2;
       $food->allergies = 'Wheat, Soy';
       $food->ingredients = 'Vegan Bacon, Tomato, Avocado, Lettuce, Lemon, Oil';
       $food->cost = 6.90;
       $food->image = 'images/sandwich.jpg';
       $food->save();

       $food = new Food();
       $food->name = 'Kale and avocado grilled cheese';
       $food->description = 'Vegan Cheese, Kale, Avocado, Balsamic Dressing';
       $food->diet_id = 2;
       $food->allergies = 'Wheat, Soy';
       $food->ingredients = 'Vegan Cheese, Kale, Avocado, Balsamic Vinegar, Oil';
       $food->cost = 6.90;
       $food->image = 'images/sandwich.jpg';
       $food->save();

       $food = new Food();
       $food->name = 'Veggie';
       $food->description = 'Vegetable medley with balsamic vinegar dressing';
       $food->diet_id = 3;
       $food->allergies = 'Wheat, Oil';
       $food->ingredients = 'Tomato, Pepper, Avocado, Cucumber, ';
       $food->cost = 6.10;
       $food->image = 'images/sandwich.jpg';
       $food->save();

       $food = new Food();
       $food->name = 'Mozzarella';
       $food->description = 'Buffallo Mozzarella, tomato and basil with olive oil';
       $food->diet_id = 3;
       $food->allergies = 'Dairy, Oil, Wheat';
       $food->ingredients = 'Mozzarella, Tomato, Basil, Olive Oil';
       $food->cost = 9.50;
       $food->image = 'images/sandwich.jpg';
       $food->save();

       $food = new Food();
       $food->name = 'Egg Salad and Spinach';
       $food->description = 'Scrambled egg with spinach and tomato';
       $food->diet_id = 3;
       $food->allergies = 'Egg, Oil, Wheat, Tomato';
       $food->ingredients = 'Egg, Spinach, Tomato, Mayonnaise';
       $food->cost = 9.50;
       $food->image = 'images/sandwich.jpg';
       $food->save();

       $food = new Food();
       $food->name = 'Tomato, Feta Crumble with Olive Oil';
       $food->description = 'Crumbled feta cheese with tomato in an olive oil dressing';
       $food->diet_id = 3;
       $food->allergies = 'Dairy Oil, Wheat, Tomato';
       $food->ingredients = 'Feta, Olive Oil, Tomato, Mayonnaise';
       $food->cost = 9.50;
       $food->image = 'images/sandwich.jpg';
       $food->save();

     }
}
