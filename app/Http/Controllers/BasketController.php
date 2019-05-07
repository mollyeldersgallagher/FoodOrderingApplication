<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Food;
use App\Basket;
use App\CreditCard;
use App\Option;
use App\Order;
use App\Http\Controllers\Controller;
use Validator;

// The Basket controller controlls the functionality of the basket.
class BasketController extends Controller
{
    // View function accepts a request object.
    public function view(Request $request)
    {
        // this request is then passed into another function
        // getBasket to retieve the contents of the basket.
        $basket = $this->getBasket($request);

        // the basket.view page is then returned with a basket object
        return view('basket.view')->with([
            'basket' => $basket
        ]);
    }

    // Add function also takes a request onject as a parameter
    public function add(Request $request)
    {
        // creating our own validator instance using the make function and passing in the
       //  request object and its rules
        $validator = Validator::make($request->all(), [
          'food_id' => 'required|integer|exists:foods,id',
          'option_id' => 'required|integer|exists:options,id',
        ]);

        // If the validation fails a flash message will apeaar on screen indicating to the customer
        // that it is an invalid request
        if ($validator->fails()) {
            $request->session()->flash('alert-error', 'Invalid request');
            return redirect()->back();
        }
        //if everything passes the validation sucessfully the following occurs
        else {
            //  food id and option id are retrieved from the request object and passed
            //  into the findOrFail function, if the id exist that row will be stored as an object.
            $food_id = $request->input('food_id');
            $food = Food::find($food_id);

            $option_id = $request->input('option_id');
            $option = Option::find($option_id);

            //using the getBasket function to retrieve all the contents of the basket
            $basket = $this->getBasket($request);

            // calling the add function from the basket object and  passing food_id, option id and its quantity.
            $basket->add($food,$option, 1);

            //  If the add function does not throw an exception a positive flash message is displayed
            //  confirming the item was added to the basket sucssfull
            $request->session()->flash('alert-success', $food->name . ' ' . $option->name.' was added to your basket!');

            return redirect()->route('welcome');
        }
    }

    public function edit(Request $request)
    {
        $basket = $this->getBasket($request);

        //  retrieves the basket contents using the get basket function and returns the basket edit view
        //  with the basket object
        return view('basket.edit')->with([
            'basket' => $basket
        ]);
    }

    public function update(Request $request)
    {
        // validating the request with the following rules
        $request->validate([
            'quantity' => 'required|array',
            'quantity.*' => 'integer|min:0'
        ]);

        // dump($basket);
        //  passing the request object into the getBasket function to retieve the contents
        //  of the basket
        $basket = $this->getBasket($request);

        // quantities in an array of all the quantities of each item in the basket
        $quantities = $request->input('quantity');
        //dd($quantities);

        // foreach loop loops though the quantities array and uses the index that has been passed
        // into the function throught the input form. In this case its an string with a seperator which we can
        // use to form an array containing the food_id and the option_id
        foreach ($quantities as $index => $quantity) {

            // explode function coverts the string into an array by using the seperator indicater to know where to start
            // and end with each value in the array.
            $parts = explode("-", $index);
            //  food_id is the first value in the array with the index of 0
            $food_id = $parts[0];
            //  option_id is the second value in the array with the index of 1
            $option_id = $parts[1];

            $food = Food::findOrFail($food_id);
            $option = Option::findOrFail($option_id);
            //dump($food);
            // calling the update fuction of the basket objectand passing in the parameters
            $basket->update($food, $option, $quantity);
        }
        // if successfull a flash message will appear
        $request->session()->flash('alert-success', 'Your basket was updated!');
        return redirect()->route('basket.view');
    }

    public function checkout(Request $request)
    {
        // retrieving the user useing the Auth class
        $user = Auth::user();
        // if the user is null
        if ($user == null) {
            // flash message appears indicating you must login to checkout
            $request->session()->flash('alert-danger', 'You need to login or register before you can checkout!');
            //redirects them to the login form
            return redirect()->route('login');
        }

        //retrievs basket contents
        $basket = $this->getBasket($request);

        // returns basket and user to the checkout page
        return view('basket.checkout')->with([
            'basket' => $basket,
            'user' => $user
        ]);
    }

    public function pay(Request $request) {
        // validates request
        $request->validate([
            'credit_card_id' => 'required|integer|min:0'
        ]);

        // gets the user
        $user = Auth::user();
        // retieves the users personal information
        // since the user and customer have a one to one relationship the customer information can
        // be retrieved from the user object
        $customer = $user->customer;

        // retrieving the creditcard id
        $credit_card_id = $request->input('credit_card_id');
        // if the id is null
        if ($credit_card_id == 0) {
            // validate request, fields are nullable due to if the creditcard id
            // isnt null there is an existing creditcard saved
            $request->validate([
                'name' => 'nullable|string|max:100',
                'number' => 'nullable|digits:16',
                'expiry' => 'nullable|regex:/[0-9]{2}\/[0-9]{2}/',
                'cvv' => 'nullable|digits:3'
            ]);

            $card = new CreditCard();
            $card->name = $request->input('name');
            $card->number = $request->input('number');
            $card->expiry = $request->input('expiry');
            $card->cvv = $request->input('cvv');
            $card->customer_id = $customer->id;
            $card->save();
        }
        else {
            $card = CreditCard::findOrFail($credit_card_id);
            // checking to see if the customer id associated with the cart matches the customer id
            if ($card->customer_id != $customer->id) {
                // if not a 401 Unauthorised is thrown
                return response(401, 'Unauthorised');
            }
        }

        // if the payment is successfull an order object is created
        $order = new Order();
        $order->received_on = date('Y-m-d');
        $order->delivery_address = $customer->address;
        $order->billing_address = $customer->address;
        $order->status = 'paid';
        $order->customer_id = $customer->id;
        $order->credit_card_id = $card->id;
        $order->save();

        // retrieves the basket object
        $basket = $this->getBasket($request);
        // gets all the items n the basket and loops through them as a single item
        foreach ($basket->getItems() as $item) {
            // from the order object to the foods funtion in the order model attach
            // the quantity and option id to the order, these will be added into the pivot table
            $order->foods()->attach($item->getFood()->id, [
                'quantity' => $item->getQuantity(),
                'option_id' => $item->getOption()->id
              ]
            );
        }

        //empty the basket after purchase
        $basket->removeAll();

        // flash message indicates that the payment and order was successfull
        $request->session()->flash('alert-success', 'Your order and payment have been received!');
        // redirects the user to the show page of their order
        return redirect()->route('user.orders.show', $order);
    }

    // get basket function
    private function getBasket(Request $request) {
        // requests the get basket from the shoppig basket class
        $basket = $request->session()->get('basket', null);
        // if it is empty create a new basket object
        if ($basket == null) {
            $basket = new ShoppingBasket();
            $request->session()->put('basket', $basket);
        }
        return $basket;
    }
}
