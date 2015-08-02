<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreCarreraRequest;
use App\Http\Requests\UpdateCarreraRequest;
use App\Http\Controllers\Controller;
use App\Escuela;
use Illuminate\Http\Request;
use Auth;

class CarrerasController extends Controller {

					/**
					 * Display a listing of the resource.
					 *
					 * @return Response
					 */
					public function index(Request $request)
					{
						$usuario = Auth::user();
						$carreras = \App\Carrera::name(ucwords($request->get("name")))->orderBy('id','DESC')->paginate();
						return view('carreras.index',compact('carreras'))->with('usuario',$usuario);
					}

					/**
					 * Show the form for creating a new resource.
					 *
					 * @return Response
					 */
					public function create()
					{
						$usuario = Auth::user();
						$escuela = Escuela::lists('nombre','id');
						return view('carreras.create')->with('escuela',$escuela)->with('usuario',$usuario);
					}

					/**
					 * Store a newly created resource in storage.
					 *
					 * @return Response
					 */
					public function store(StoreCarreraRequest $request)
					{
						$usuario = Auth::user();
						$carrera = new \App\Carrera;

						$carrera->codigo = $request->input('codigo');
						$carrera->nombre = ucwords($request->input('nombre'));
						$carrera->escuela_id = $request->input('escuela_id');
						$carrera->descripcion = ucfirst($request->input('descripcion'));

						$carrera->save();

						return redirect()->route('carreras.index')->with('message', 'Carrera Agregada')->with('usuario',$usuario);
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
						$carrera = \App\Carrera::find($id);
						$escuela= Escuela::find($carrera->escuela_id);
						return view('carreras.show')->with('carrera',$carrera)->with('escuela',$escuela)->with('usuario',$usuario);
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
						$escuela = Escuela::lists('nombre','id');
						return view('carreras.edit')->with('carrera', \App\Carrera::find($id))->with('escuela',$escuela)->with('usuario',$usuario);
					}

					/**
					 * Update the specified resource in storage.
					 *
					 * @param  int  $id
					 * @return Response
					 */
					public function update(UpdateCarreraRequest $request, $id)
					{
						$usuario = Auth::user();
						$carrera = \App\Carrera::find($id);

						$carrera->codigo = $request->input('codigo');
						$carrera->nombre = ucwords($request->input('nombre'));
						$carrera->escuela_id = $request->input('escuela_id');
						$carrera->descripcion = ucfirst($request->input('descripcion'));

						$carrera->save();
						return redirect()->route('carreras.index', ['carrera' => $id])->with('message', 'Cambios guardados')->with('usuario',$usuario);
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
						$carrera = \App\Carrera::find($id);

						$carrera->delete();

						return redirect()->route('carreras.index')->with('message', 'Carrera Eliminada con éxito')->with('usuario',$usuario);
					}

					public function exportarCarreras()
					{
						\Excel::create('CarrerasExportadas', function($excel) {

						           $excel->sheet('Carreras', function($sheet) {

						               $carrera = \App\Carrera::all();
						               $sheet->fromArray($carrera);

						           });
						       })->export('csv');
									return redirect()->route("carreras.index")->with('carreras', \App\Carrera::paginate(10)
																	->setPath('carreras'));
					}

				}
