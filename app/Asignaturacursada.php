<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignaturacursada extends Model {

	protected $table = 'asignaturas_cursadas';
	protected $fillable = ['curso_id', 'estudiante_id'];
	protected $guarded = ['id'];

}
