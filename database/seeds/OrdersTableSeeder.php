<?php

use Illuminate\Database\Seeder;
use App\Food;
use App\Order;
use App\Customer;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = Customer::all();
        $foods = Food::all();

        foreach ($customers as $customer) {
            $order = new Order();
            $order->received_on = $this->randomDate();
            $order->delivery_address = $customer->address;
            $order->billing_address = $customer->address;
            $order->status = 'paid';
            $order->customer_id = $customer->id;
            $order->credit_card_id = $customer->credit_cards->first()->id;
            $order->save();

            foreach ($foods as $food) {
                if (rand(1,100) < 50) {
                    $order->foods()->attach($food, ['quantity' => rand(1,5)]);
                }
            }
        }
    }

    private function randomDate() {
        $start = new DateTime('2017-01-01');
        $end = new DateTime('2017-12-31');
        $randomTimestamp = mt_rand($start->getTimestamp(), $end->getTimestamp());
        $randomDate = new DateTime();
        $randomDate->setTimestamp($randomTimestamp);
        return $randomDate->format('Y-m-d');
    }
}
