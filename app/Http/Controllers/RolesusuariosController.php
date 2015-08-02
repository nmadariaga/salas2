<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreRolesUsuariosRequest;
use App\Http\Requests\UpdateRolesUsuariosRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use Auth;

class RolesusuariosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
		{
			$usuario = Auth::user();
			$rolesusuarios = \App\Rolusuario::name(ucwords($request->get("name")))->orderBy('id','DESC')->paginate();
			return view('rolesusuarios.index',compact('rolesusuarios'))->with('usuario',$usuario);
		}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$usuario = Auth::user();
		$rol = \App\Role::lists('nombre', 'id');
		return view('rolesusuarios.create')->with('rol',$rol)->with('usuario',$usuario);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreRolesUsuariosRequest $request)
	{
		$usuario = Auth::user();
		$rolesusuarios = new \App\Rolusuario;

		$rolesusuarios->rut = $request->input('rut');
		$rolesusuarios->rol_id = $request->input('rol_id');


		$rolesusuarios->save();

		return redirect()->route('rolesusuarios.index')->with('message', 'Rol Agregado a usuario')->with('usuario',$usuario);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$usuario = Auth::user();
		$rolesusuarios = \App\Rolusuario::find($id);
		$rol = \App\Role::find($rolesusuarios->rol_id);
		return view('rolesusuarios.show')->with('rolesusuario',$rolesusuarios)->with('rol',$rol)->with('usuario',$usuario);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usuario = Auth::user();
		$rol = \App\Role::lists('nombre', 'id');
		return view('rolesusuarios.edit')->with('rolesusuario', \App\Rolusuario::find($id))->with('rol',$rol)->with('usuario',$usuario);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateRolesUsuariosRequest $request, $id)
	{
		$usuario = Auth::user();
		$rolesusuarios = \App\Rolusuario::find($id);

		$rolesusuarios->rut = $request->input('rut');
		$rolesusuarios->rol_id = $request->input('rol_id');

		$rolesusuarios->save();
		return redirect()->route('rolesusuarios.index')->with('message', 'Cambios guardados')->with('usuario',$usuario);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuario = Auth::user();
		$rolesusuarios = \App\Rolusuario::find($id);

		$rolesusuarios->delete();

		return redirect()->route('rolesusuarios.index')->with('message', 'Rol Eliminado con éxito')->with('usuario',$usuario);
	}

}
