<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

Route::get('/', function()
{
    return redirect('auth/login');
});

/*Route::get('bienvenido', function()
{
    return view();
});*/

Route::resource('alumno','AlumnosController');

Route::get('home', 'HomeController@index');

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/

Route::controller('auth', 'Auth\AuthController', [
    'getLogin'  => 'auth.login',
    'postLogin' => 'auth.doLogin',
    'getLogout' => 'auth.logout'
]);

Route::group(['middleware' => 'roladmin'], function ()
{
  Route::resource('campus','CampusController');
  Route::resource('facultades','FacultadesController');
  Route::resource('departamentos','DepartamentosController');
  Route::resource('escuelas','EscuelasController');
  Route::resource('carreras','CarrerasController');
  Route::resource('docentes','DocentesController');
  Route::resource('estudiantes','EstudiantesController');
  Route::resource('funcionarios','FuncionariosController');

});

Route::group(['middleware' => 'rolencargado'], function ()
{
  Route::resource('salas','SalasController');
  Route::resource('tiposdesalas','TiposdesalasController');
  Route::resource('asignaturas','AsignaturasController');
  //Route::resource('asignaturascursadas','AsignaturasCursadasController');
  Route::resource('cursos','CursosController');
  Route::resource('periodos','PeriodosController');
  Route::resource('horarios','HorariosController');

});

Route::resource('roles','RolesController');
Route::resource('rolesusuarios','RolesusuariosController');


//Route::get('login','LoginController@index');

Route::get('/bienvenido',['middleware' => ['auth', 'direccionador_rol_middleware'],'as'=>'bienvenida.index','uses'=> 'MenuController@Seleccion']);
Route::get('/admin/menu','MenuController@menuAdministrador');
Route::get('/admin/inicio', ['middleware' => ['auth'],'as'=>'admin.index','uses'=> 'MenuController@inicioAdministrador']);
Route::get('/encargado/menu' ,['middleware' => ['auth', 'rolencargado'],'as'=>'encargado.index','uses'=> 'MenuController@menuEncargado']);
