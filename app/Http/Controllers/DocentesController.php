<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreDocenteRequest;
use App\Http\Requests\UpdateDocenteRequest;
use App\Http\Controllers\Controller;
use App\Departamento;
use Illuminate\Http\Request;

class DocentesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("docentes.index")->with('docentes', \App\Docente::paginate(5)->setPath('docente'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$departamento = Departamento::lists('nombre','id');
		return view('docentes.create')->with('departamento',$departamento);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreDocenteRequest $request)
	{
		$docentes = new \App\Docente;

		$docentes->departamento_id = $request->input('departamento_id');
		$docentes->rut = $request->input('rut');
		$docentes->nombres = ucwords($request->input('nombres'));
		$docentes->apellidos = ucwords($request->input('apellidos'));

		$docentes->save();

		return redirect()->route('docentes.index')->with('message', 'Docente Agregado');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$docentes = \App\Docente::find($id);
		$departamento = Departamento::find($docentes->departamento_id);
		return view('docentes.show')->with('docente',$docentes)->with('departamento',$departamento);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$departamento = Departamento::lists('nombre','id');
		return view('docentes.edit')->with('docente', \App\Docente::find($id))->with('departamento',$departamento);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateDocenteRequest $request, $id)
	{
		$docentes = \App\Docente::find($id);

		$docentes->departamento_id = $request->input('departamento_id');
		$docentes->rut = $request->input('rut');
		$docentes->nombres = ucwords($request->input('nombres'));
		$docentes->apellidos = ucwords($request->input('apellidos'));

		$docentes->save();
		return redirect()->route('docentes.index', ['docente' => $id])->with('message', 'Cambios guardados');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$docentes = \App\Docente::find($id);

		$docentes->delete();

		return redirect()->route('docentes.index')->with('message', 'Docente Eliminado con éxito');
	}

}
