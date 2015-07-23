<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreEscuelaRequest;
use App\Http\Requests\UpdateEscuelaRequest;
use App\Http\Controllers\Controller;
use App\Departamento;
use Illuminate\Http\Request;

class EscuelasController extends Controller {

				/**
				 * Display a listing of the resource.
				 *
				 * @return Response
				 */
				public function index()
				{
					return view("escuelas.index")->with('escuelas', \App\Escuela::paginate(5)->setPath('escuela'));
				}

				/**
				 * Show the form for creating a new resource.
				 *
				 * @return Response
				 */
				public function create()
				{
					$departamento = Departamento::lists('nombre','id');
					return view('escuelas.create')->with('departamento',$departamento);
				}

				/**
				 * Store a newly created resource in storage.
				 *
				 * @return Response
				 */
				public function store(StoreEscuelaRequest $requets)
				{
					$escuela = new \App\Escuela;

					$escuela->nombre = ucwords($request->input('nombre'));
					$escuela->departamento_id = $request->input('departamento_id');
					$escuela->descripcion = ucfirst($request->input('descripcion'));

					$escuela->save();

					return redirect()->route('escuelas.index')->with('message', 'Escuela Agregada');
				}

				/**
				 * Display the specified resource.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function show($id)
				{
					$escuela = \App\Escuela::find($id);
					$departamento = Departamento::find($escuela->departamento_id);
					return view('escuelas.show')->with('escuela',$escuela)->with('departamento',$departamento);
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
					return view('escuelas.edit')->with('escuela', \App\Escuela::find($id))->with('departamento',$departamento);
				}

				/**
				 * Update the specified resource in storage.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function update(UpdateEscuelaRequest $request, $id)
				{
					$escuela = \App\Escuela::find($id);

					$escuela->nombre = ucwords($request->input('nombre'));
					$escuela->departamento_id = $request->input('departamento_id');
					$escuela->descripcion = ucfirst($request->input('descripcion'));

					$escuela->save();
					return redirect()->route('escuelas.index', ['escuela' => $id])->with('message', 'Cambios guardados');
				}

				/**
				 * Remove the specified resource from storage.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function destroy($id)
				{
					$escuela = \App\Escuela::find($id);

					$escuela->delete();

					return redirect()->route('escuelas.index')->with('message', 'Escuela Eliminada con éxito');
				}

			}
