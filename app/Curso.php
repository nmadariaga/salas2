<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model {

	protected $table = 'cursos';
	protected $fillable = ['semestre', 'anio', 'seccion', 'docente_id', 'asignatura_id'];
	protected $guarded = ['id'];

    public function asignatura()
    {
        return $this->belongsTo('App\Asignatura');
    }

    public function docente()
    {
        return $this->belongsTo('App\Docente');
    }

    public function horarios()
    {
        return $this->hasMany('App\Horario');
    }

    public function estudiante()
    {
        return $this->belongsToMany('App\Estudiante');
    }
}
