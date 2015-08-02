<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreAsignaturaRequest;
use App\Http\Requests\UpdateAsignaturasRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departamento;
use Auth;

class AsignaturasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$usuario = Auth::user();
			$asignaturas = \App\Asignatura::name($request->get("name"))->orderBy('id','DESC')->paginate();
			return view('asignaturas.index',compact('asignaturas'))->with('usuario',$usuario);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$usuario = Auth::user();
		$departamento = \App\Departamento::lists('nombre','id');
		return view('asignaturas.create')->with('departamento',$departamento)->with('usuario',$usuario);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreAsignaturaRequest $request)
	{
		$usuario = Auth::user();
		$asignaturas = new \App\Asignatura;

		$asignaturas->nombre = ucwords($request->input('nombre'));
		$asignaturas->codigo = strtoupper($request->input('codigo'));
		$asignaturas->descripcion = ucfirst($request->input('descripcion'));
		$asignaturas->departamento_id = $request->input('departamento_id');

		$asignaturas->save();

		return redirect()->route('asignaturas.index')->with('message', 'asignaturas Agregado')->with('usuario',$usuario);
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
		$asignaturas = \App\Asignatura::find($id);
    $departamento = \App\Departamento::find($asignaturas->departamento_id);
		return view('asignaturas.show')->with('asignatura',$asignaturas)->with('departamentos',$departamento)->with('usuario',$usuario);
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
		$departamentos = \App\Departamento::lists('nombre','id');
		return view('asignaturas.edit')->with('asignatura', \App\Asignatura::find($id))->with('departamentos',$departamentos)->with('usuario',$usuario);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateAsignaturasRequest $request, $id)
	{
		$usuario = Auth::user();
		$asignaturas = \App\Asignatura::find($id);

		$asignaturas->nombre = ucwords($request->input('nombre'));
		$asignaturas->codigo = strtoupper($request->input('codigo'));
		$asignaturas->descripcion = ucfirst($request->input('descripcion'));
		$asignaturas->departamento_id = $request->input('departamento_id');

		$asignaturas->save();
		return redirect()->route('asignaturas.index')->with('message', 'Cambios guardados');
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
		$asignaturas = \App\Asignatura::find($id);

		$asignaturas->delete();

		return redirect()->route('asignaturas.index')->with('message', 'asignaturas Eliminado con éxito')->with('usuario',$usuario);
	}


}
