<?php

namespace App\Http\Middleware;

use Closure;
use App;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*dump(auth()->user()->lvl);
        die();*/
        if (auth()->guest()){
            flash('You need to be Admin')->error();
            /*echo 'ici'; die();*/
            return redirect('/');
            }elseif (auth()->user()->lvl == 10 ){
                    flash('You need to be Super-Admin')->error();
                    /*echo 'ici'; die();*/
                    return redirect('/');
        }
        return $next($request);
    }
}
