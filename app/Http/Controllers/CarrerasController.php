<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Escuela;
use Illuminate\Http\Request;

class CarrerasController extends Controller {

					/**
					 * Display a listing of the resource.
					 *
					 * @return Response
					 */
					public function index()
					{
						return view("carreras.index")->with('carreras', \App\Carrera::paginate(5)->setPath('carrera'));
					}

					/**
					 * Show the form for creating a new resource.
					 *
					 * @return Response
					 */
					public function create()
					{
						$escuela = Escuela::lists('nombre','id');
						return view('carreras.create')->with('escuela',$escuela);
					}

					/**
					 * Store a newly created resource in storage.
					 *
					 * @return Response
					 */
					public function store()
					{
						$carrera = new \App\Carrera;

						$carrera->codigo = \Request::input('codigo');
						$carrera->nombre = \Request::input('nombre');
						$carrera->escuela_id = \Request::input('escuela_id');
						$carrera->descripcion = \Request::input('descripcion');

						$carrera->save();

						return redirect()->route('carreras.index')->with('message', 'Carrera Agregada');
					}

					/**
					 * Display the specified resource.
					 *
					 * @param  int  $id
					 * @return Response
					 */
					public function show($id)
					{
						$carrera = \App\Carrera::find($id);
						$escuela= Escuela::find($carrera->escuela_id);
						return view('carreras.show')->with('carrera',$carrera)->with('escuela',$escuela);
					}

					/**
					 * Show the form for editing the specified resource.
					 *
					 * @param  int  $id
					 * @return Response
					 */
					public function edit($id)
					{
						$escuela = Escuela::lists('nombre','id');
						return view('carreras.edit')->with('carrera', \App\Carrera::find($id))->with('escuela',$escuela);
					}

					/**
					 * Update the specified resource in storage.
					 *
					 * @param  int  $id
					 * @return Response
					 */
					public function update($id)
					{
						$carrera = \App\Carrera::find($id);

						$carrera->codigo = \Request::input('codigo');
						$carrera->nombre = \Request::input('nombre');
						$carrera->escuela_id = \Request::input('escuela_id');
						$carrera->descripcion = \Request::input('descripcion');

						$carrera->save();
						return redirect()->route('carreras.index', ['carrera' => $id])->with('message', 'Cambios guardados');
					}

					/**
					 * Remove the specified resource from storage.
					 *
					 * @param  int  $id
					 * @return Response
					 */
					public function destroy($id)
					{
						$carrera = \App\Carrera::find($id);

						$carrera->delete();

						return redirect()->route('carreras.index')->with('message', 'Carrera Eliminada con éxito');
					}

				}
