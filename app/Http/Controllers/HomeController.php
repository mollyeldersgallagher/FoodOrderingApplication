<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
          //retrieving the users information
         $user = Auth::user();

         // if the role of the user is an admin, send them to admin.home
         if($user->hasRole('admin')) {
             $route = 'admin.home';
         }
         //if the role is user send them to user home
         else if($user->hasRole('user')) {
             $route = 'user.home';
         }
         // if user has no role through an exception of user role underfined
         else {
             throw Exception('Undefined user role');
         }
         return redirect()->route($route);
     }
 }
