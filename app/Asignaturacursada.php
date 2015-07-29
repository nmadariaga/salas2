<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignaturacursada extends Model {

	protected $table = 'curso_estudiante';
	protected $fillable = ['curso_id', 'estudiante_id'];
	protected $guarded = ['id'];


	public function estudiantes()
	{
		return $this->belongsToMany('App\Estudiante');
	}

	public function cursos()
	{
		return $this->belongsToMany('App\Curso');
	}
}
