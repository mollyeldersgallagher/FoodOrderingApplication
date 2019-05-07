<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class AuthRole
{
  // function that handels the request and roles
  public function handle($request, Closure $next, String $role){
    // if there user doesnt exist or has no role response or unauthorised 401
    if(!$request->user() || !$request->user()->hasRole($role)){
      return response('Unauthorised.',401);
    }
    return $next($request);
  }
}
