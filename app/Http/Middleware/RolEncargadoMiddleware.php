<?php namespace App\Http\Middleware;

use Closure;

class RolEncargadoMiddleware {

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
		$rol_encargado = \App\Role::whereNombre('Encargado')->first();

		if(!$rol_encargado->usuarios()->find($user->rut))
		{
			return redirect('auth/login');
		}

		return $next($request);
	}

}
