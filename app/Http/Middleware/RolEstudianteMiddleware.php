<?php namespace App\Http\Middleware;

use Closure;

class RolEstudianteMiddleware {

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
		$rol_est = \App\Role::whereNombre('Estudiante')->first();

		if(!$rol_est->usuarios()->find($user->rut))
		{
			return redirect('auth/login');
		}

		return $next($request);

	}

}
