<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoDeSalaRequest;
use App\Http\Requests\UpdateTipoDeSalaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class TiposdesalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuario = Auth::user();
		return view('tiposdesalas.index')->with('tiposdesalas', \App\Tipodesala::paginate(5)->setPath('tiposdesala'))->with('usuario',$usuario);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$usuario = Auth::user();
		return view('tiposdesalas.create')->with('usuario',$usuario);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreTipoDeSalaRequest $request)
	{
		$usuario = Auth::user();
		$tiposdesalas = new \App\Tipodesala;

		$tiposdesalas->nombre = ucwords($request->input('nombre'));
		$tiposdesalas->descripcion = ucfirst($request->input('descripcion'));
		$tiposdesalas->save();

		return redirect()->route('tiposdesalas.index')->with('message', 'Tipo de Sala Agregada')->with('usuario',$usuario);
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
		$tiposdesalas = \App\Tipodesala::find($id);
		return view('tiposdesalas.show')->with('tiposdesala',$tiposdesalas)->with('usuario',$usuario);
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
		return view('tiposdesalas.edit')->with('tiposdesala', \App\Tipodesala::find($id))->with('usuario',$usuario);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateTipoDeSalaRequest $request, $id)
	{
		$usuario = Auth::user();
		$tiposdesalas = \App\Tipodesala::find($id);
		$tiposdesalas->nombre = ucwords($request->input('nombre'));
		$tiposdesalas->descripcion = ucfirst($request->input('descripcion'));
		$tiposdesalas->save();
		return redirect()->route('tiposdesalas.index', ['tiposdesala' => $id])->with('message', 'Cambios guardados')->with('usuario',$usuario);
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
		$tiposdesalas = \App\Tipodesala::find($id);
		$tiposdesalas->delete();
		return redirect()->route('tiposdesalas.index')->with('message', 'Tipo de Sala Eliminada con éxito')->with('usuario',$usuario);
	}

}
