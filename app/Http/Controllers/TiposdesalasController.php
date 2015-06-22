<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TiposdesalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('tiposdesalas.index')->with('tiposdesalas', \App\Tipodesala::paginate(5)->setPath('tiposdesala'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tiposdesalas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$tiposdesalas = new \App\Tipodesala;
		$tiposdesalas->nombre = \Request::input('nombre');
		$tiposdesalas->descripcion = \Request::input('descripcion');
		$tiposdesalas->save();

		return redirect()->route('tiposdesalas.index')->with('message', 'Tipo de Sala Agregada');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tiposdesalas = \App\Tipodesala::find($id);
		return view('tiposdesalas.show')->with('tiposdesala',$tiposdesalas);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('tiposdesalas.edit')->with('tiposdesala', \App\Tipodesala::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tiposdesalas = \App\Tipodesala::find($id);
		$tiposdesalas->nombre = \Request::input('nombre');
		$tiposdesalas->descripcion = \Request::input('descripcion');
		$tiposdesalas->save();
		return redirect()->route('tiposdesalas.index', ['tiposdesala' => $id])->with('message', 'Cambios guardados');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tiposdesalas = \App\Tipodesala::find($id);
		$tiposdesalas->delete();
		return redirect()->route('tiposdesalas.index')->with('message', 'Tipo de Sala Eliminada con éxito');
	}

}
