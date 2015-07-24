<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCampusRequest;
use App\Http\Requests\UpdateCampusRequest;
use Illuminate\Http\Request;

class CampusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("campus.index")->with('campus', \App\Campus::paginate(20)->setPath('campu'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('campus.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreCampusRequest $request)
	{
		$campus = new \App\Campus;

		$campus->nombre = ucwords($request->input('nombre'));
		$campus->direccion = ucwords($request->input('direccion'));
		$campus->latitud = $request->input('latitud');
		$campus->longitud = $request->input('longitud');
		$campus->descripcion = ucfirst($request->input('descripcion'));
		$campus->rut_encargado = $request->input('rut_encargado');

		$campus->save();

		return redirect()->route('campus.index')->with('message', 'Campus Agregado');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$campus = \App\Campus::find($id);

		return view('campus.show')->with('campu',$campus);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('campus.edit')->with('campu', \App\Campus::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateCampusRequest $request, $id)
	{
		$campus = \App\Campus::find($id);

		$campus->nombre = ucwords($request->input('nombre'));
		$campus->direccion = ucwords($request->input('direccion'));
		$campus->latitud = $request->input('latitud');
		$campus->longitud = $request->input('longitud');
		$campus->descripcion = ucfirst($request->input('descripcion'));
		$campus->rut_encargado = $request->input('rut_encargado');

		$campus->save();
		return redirect()->route('campus.index', ['campu' => $id])->with('message', 'Cambios guardados');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$campus = \App\Campus::find($id);

		$campus->delete();

		return redirect()->route('campus.index')->with('message', 'Campus Eliminado con éxito');
	}


}
