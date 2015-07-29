<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model {

	protected $table = 'estudiantes';
	protected $fillable = ['carrera_id','rut','nombres','apellidos','email'];
	protected $guarded = ['id'];


    public function carrera()
    {
        return $this->belongsTo('App\Carrera');
    }

	public function cursos()
	{
		return $this->belongsToMany('App\Curso', 'curso_estudiante');
	}

	public function usuario()
	{
		return $this->belongsTo('App\Usuario', 'rut');
	}
}
