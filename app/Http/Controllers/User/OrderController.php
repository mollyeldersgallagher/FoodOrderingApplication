<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('role:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $user = Auth::user();

         $orders = $user->customer->orders;

         return view('user.orders.index')->with([
           'orders' => $orders
         ]);


     }

     public function show($id)
     {
         $order = Order::findOrFail($id);

         return view('user.orders.show')->with([
           'order' => $order
         ]);


     }
 }
