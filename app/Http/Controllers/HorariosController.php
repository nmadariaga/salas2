<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreHorarioRequest;
use App\Http\Requests\UpdateHorarioRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HorariosController extends Controller {

			/**
			 * Display a listing of the resource.
			 *
			 * @return Response
			 */
			public function index()
			{
				$cursos = \App\Curso::all();
				$cursos_list = array();
				foreach ($cursos as $curso) {
					$cursos_list[$curso->id] = sprintf('%s (Seccion %d)', $curso->asignatura->nombre,
						$curso->seccion);
				}
				return view("horarios.index")->with('curso',$cursos_list)->with('horarios', \App\Horario::paginate(20)->setPath('horario'));
			}

			/**
			 * Show the form for creating a new resource.
			 *
			 * @return Response
			 */
			public function create()
			{
				$periodo = \App\Periodo::lists('bloque','id');
				$sala = \App\Sala::lists('nombre','id');
				$cursos = \App\Curso::all();
				$cursos_list = array();
				foreach ($cursos as $curso) {
					$cursos_list[$curso->id] = sprintf('%s (Seccion %d)', $curso->asignatura->nombre,
						$curso->seccion);
				}
				$asignatura = \App\Asignatura::lists('nombre','id');
				return view('horarios.create')->with('periodo',$periodo)->with('salas',$sala)->with('curso',$cursos_list)->with('asignatura',$asignatura);
			}

			/**
			 * Store a newly created resource in storage.
			 *
			 * @return Response
			 */
			public function store(StoreHorarioRequest $request)
			{

					$inicio = $request->input('fechaInicial');
					//$fin = $request->input('fechaFinal');
					$fechaInicial = date_create($request->input('fechaInicial'));
					$fechaFinal = date_create($request->input('fechaFinal'));
					(int)$diferenciaEnSemanas = $fechaInicial->diff($fechaFinal)
																									 ->format('%R%a días')/7;

					for($i=1; $i<$diferenciaEnSemanas; $i++)
					{
						$inicio = strtotime ( '+7 day' , strtotime ( $inicio ) ) ;
						$inicio = date ( 'Y-m-j' , $inicio );
						$horario = new \App\Horario;
						$horario->fecha = $inicio;
						$horario->sala_id = $request->input('salas_id');
						$horario->periodo_id = $request->input('periodo_id');
						$horario->curso_id= $request->input('curso_id');
						$horario->save();
					}

				return redirect()->route('horarios.index')->with('message', 'horario Agregado');
			}

			/**
			 * Display the specified resource.
			 *
			 * @param  int  $id
			 * @return Response
			 */
			public function show($id)
			{
				$horario = \App\Horario::find($id);
      	$periodo = \App\Periodo::find($horario->periodo_id);
				$sala = \App\Sala::find($horario->sala_id);
				$curso = \App\Curso::find($horario->sala_id);
				return view('horarios.show')->with('horario',$horario)->with('periodo',$periodo)->with('sala',$sala)->with('curso',$curso);
			}

			/**
			 * Show the form for editing the specified resource.
			 *
			 * @param  int  $id
			 * @return Response
			 */
			public function edit($id)
			{
				$periodos = \App\Periodo::lists('bloque','id');
				$salas = \App\Sala::lists('nombre','id');
				$asignaturas = \App\Asignatura::lists('nombre','id');
				return view('horarios.edit')->with('horario', \App\Horario::find($id))
				                            ->with('periodos',$periodos)
				                            ->with('salas', $salas)
			                                ->with('asignaturas', $asignaturas);

			}

			/**
			 * Update the specified resource in storage.
			 *
			 * @param  int  $id
			 * @return Response
			 */
			public function update(UpdateHorarioRequest $request, $id)
			{
				$horario = \App\Horario::find($id);

				$horario->fecha = $request->input('fecha');
				$horario->sala_id = $request->input('sala_id');
				$horario->periodo_id = $request->input('periodo_id');
				$horario->curso_id = $request->input('curso_id');

				$horario->save();
				return redirect()->route('horarios.index', ['horario' => $id])->with('message', 'Cambios guardados');
			}

			/**
			 * Remove the specified resource from storage.
			 *
			 * @param  int  $id
			 * @return Response
			 */
			public function destroy($id)
			{
				$horario = \App\Horario::find($id);

				$horario->delete();

				return redirect()->route('horarios.index')->with('message', 'Horario eliminado con éxito');
			}

		}
