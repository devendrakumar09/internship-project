<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Role;
class StaffMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    { 
        $user = Auth::user();
        if (Auth::check() && $user->role->title == 'staff') {
            return $next($request);
        }
        return redirect('home')->with('error','You have not Staff access');
    }
}
