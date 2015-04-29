<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session; 


class loginMiddlware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(!Session::has('UntappdAccessToken')){
			return redirect('/');
		}
		return $next($request);
	}

}
