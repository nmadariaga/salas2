<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RolesusuariosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("rolesusuarios.index")->with('rolesusuarios', \App\Rolusuario::paginate(5)->setPath('rolesusuario'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('rolesusuarios.create');
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rolesusuarios = new \App\Rolusuario;

		$rolesusuarios->rut = \Request::input('rut');
		$rolesusuarios->rol_id = \Request::input('rol_id');

		$rolesusuarios->save();

		return redirect()->route('rolesusuarios.index')->with('message', 'Rol Agregado a usuario');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$rolesusuarios = \App\Rolusuario::find($id);

		return view('rolesusuarios.show')->with('rolesusuario',$rolesusuarios);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('rolesusuarios.edit')->with('rolesusuario', \App\Rolusuario::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rolesusuarios = \App\Rolusuario::find($id);

		$rolesusuarios->rut = \Request::input('rut');
		$rolesusuarios->rol_id = \Request::input('rol_id');

		$rolesusuarios->save();
		return redirect()->route('rolesusuarios.index')->with('message', 'Cambios guardados');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$rolesusuarios = \App\Rolusuario::find($id);

		$rolesusuarios->delete();

		return redirect()->route('rolesusuarios.index')->with('message', 'Rol Eliminado con éxito');
	}

}
