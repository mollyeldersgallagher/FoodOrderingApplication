<?php

use Illuminate\Database\Seeder;
use App\CreditCard;
use App\Customer;

class CreditCardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = Customer::all();

        foreach ($customers as $customer) {
            $card = new CreditCard();
            $card->name = $customer->user->name;
            $card->number = $this->random_str(16, '0123456789');
            $card->expiry = $this->random_str(2, '0123456789') . '/' . $this->random_str(2, '0123456789');
            $card->cvv = $this->random_str(3, '0123456789');
            $card->customer_id = $customer->id;
            $card->save();
        }
    }

    private function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
}
