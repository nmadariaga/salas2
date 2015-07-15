<?php namespace App\Http\Middleware;

use Closure;
use App\Role;
use Auth;

class direccionador_rol_middleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user=Auth::user();
		$rol_adm=Role::whereNombre("Administrador")->first();
		$rol_est=Role::whereNombre("Estudiante")->first();
		$rol_func=Role::whereNombre("Encargado")->first();
		$rol_aca=Role::whereNombre("Academico")->first();

		if($rol_adm->usuarios()->find($user->rut))
		{
			return redirect('admin/inicio');
		}

		/*if(!$rol_est->usuarios()->find($user->rut))
		{
			return redirect('admin/inicio');
		}*/

		if($rol_func->usuarios()->find($user->rut))
		{
			return redirect('encargado/menu');
		}

		/*if(!$rol_aca->usuarios()->find($user->rut))
		{
			return redirect('admin/inicio');
		}*/

		return $next($request);
	}

}
