<?php

namespace App\Http\Controllers\Admin;

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
      $this->middleware('role:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {


         $orders = Order::all();

         return view('admin.orders.index')->with([
           'orders' => $orders
         ]);


     }

     public function show($id)
     {
         $order = Order::findOrFail($id);

         return view('admin.orders.show')->with([
           'order' => $order
         ]);


     }
     public function destroy(Request $request,$id)
     {
         $order = Order::findOrFail($id);
         $order->delete();
         return redirect()->route('admin.orders.index');
     }
 }
