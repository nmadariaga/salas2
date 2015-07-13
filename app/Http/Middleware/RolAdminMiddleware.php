<?php namespace App\Http\Middleware;

use Closure;

class RolAdminMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = \Auth::user();
		$rol_adm = \App\Role::whereNombre('administrador')->first();
    
		if(!$rol_adm->usuarios()->find($user->rut))
		{    
			return redirect('auth/login');
		}

		return $next($request);

	}

}
