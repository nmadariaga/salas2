<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreRolRequest;
use App\Http\Requests\UpdateRolRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class RolesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
		{
			$usuario = Auth::user();
			$roles = \App\Role::name(ucwords($request->get("name")))->orderBy('id','DESC')->paginate();
			return view('roles.index',compact('roles'))->with('usuario',$usuario);
		}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$usuario = Auth::user();
		return view('roles.create')->with('usuario',$usuario);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreRolRequest $request)
	{
		$usuario = Auth::user();
		$roles = new \App\Role;

		$roles->nombre = ucwords($request->input('nombre'));
		$roles->descripcion = ucfirst($request->input('descripcion'));

		$roles->save();

		return redirect()->route('roles.index')->with('message', 'Rol Agregado')->with('usuario',$usuario);
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
		$roles = \App\Role::find($id);

		return view('roles.show')->with('role',$roles);
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
		return view('roles.edit')->with('role', \App\Role::find($id))->with('usuario',$usuario);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateRolRequest $request, $id)
	{
		$usuario = Auth::user();
		$roles = \App\Role::find($id);

		$roles->nombre = ucwords($request->input('nombre'));
		$roles->descripcion = ucfirst($request->input('descripcion'));

		$roles->save();
		return redirect()->route('roles.index')->with('message', 'Cambios guardados')->with('usuario',$usuario);
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
		$roles = \App\Role::find($id);

		$roles->delete();

		return redirect()->route('roles.index')->with('message', 'Rol Eliminado con éxito')->with('usuario',$usuario);
	}


}
