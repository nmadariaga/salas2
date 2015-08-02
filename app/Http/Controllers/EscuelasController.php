<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreEscuelaRequest;
use App\Http\Requests\UpdateEscuelaRequest;
use App\Http\Controllers\Controller;
use App\Departamento;
use Illuminate\Http\Request;
use Auth;

class EscuelasController extends Controller {

				/**
				 * Display a listing of the resource.
				 *
				 * @return Response
				 */
				public function index(Request $request)
		{
			$usuario = Auth::user();
			$escuelas = \App\Escuela::name(ucwords($request->get("name")))->orderBy('id','DESC')->paginate();
			return view('escuelas.index',compact('escuelas'))->with('usuario',$usuario);
		}

				/**
				 * Show the form for creating a new resource.
				 *
				 * @return Response
				 */
				public function create()
				{
					$usuario = Auth::user();
					$departamento = Departamento::lists('nombre','id');
					return view('escuelas.create')->with('departamento',$departamento)->with('usuario',$usuario);
				}

				/**
				 * Store a newly created resource in storage.
				 *
				 * @return Response
				 */
				public function store(StoreEscuelaRequest $request)
				{
					$usuario = Auth::user();
					$escuela = new \App\Escuela;

					$escuela->nombre = ucwords($request->input('nombre'));
					$escuela->departamento_id = $request->input('departamento_id');
					$escuela->descripcion = ucfirst($request->input('descripcion'));

					$escuela->save();

					return redirect()->route('escuelas.index')->with('message', 'Escuela Agregada')->with('usuario',$usuario);
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
					$escuela = \App\Escuela::find($id);
					$departamento = Departamento::find($escuela->departamento_id);
					return view('escuelas.show')->with('escuela',$escuela)->with('departamento',$departamento)->with('usuario',$usuario);
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
					$departamento = Departamento::lists('nombre','id');
					return view('escuelas.edit')->with('escuela', \App\Escuela::find($id))->with('departamento',$departamento)->with('usuario',$usuario);
				}

				/**
				 * Update the specified resource in storage.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function update(UpdateEscuelaRequest $request, $id)
				{
					$usuario = Auth::user();
					$escuela = \App\Escuela::find($id);

					$escuela->nombre = ucwords($request->input('nombre'));
					$escuela->departamento_id = $request->input('departamento_id');
					$escuela->descripcion = ucfirst($request->input('descripcion'));

					$escuela->save();
					return redirect()->route('escuelas.index', ['escuela' => $id])->with('message', 'Cambios guardados')->with('usuario',$usuario);
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
					$escuela = \App\Escuela::find($id);

					$escuela->delete();

					return redirect()->route('escuelas.index')->with('message', 'Escuela Eliminada con éxito')->with('usuario',$usuario);
				}

			}
