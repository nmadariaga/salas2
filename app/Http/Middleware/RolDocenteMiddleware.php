<?php namespace App\Http\Middleware;

use Closure;

class RolDocenteMiddleware {

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
		$rol_aca = \App\Role::whereNombre('Docente')->first();

		if(!$rol_aca->usuarios()->find($user->rut))
		{
			return redirect('auth/login');
		}

		return $next($request);

	}

}
