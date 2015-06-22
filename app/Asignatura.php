<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model {

	protected $table = 'asignaturas';
	protected $fillable = ['codigo', 'nombre', 'descripcion', 'departamento_id'];
	protected $guarded = ['id'];

	public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    public function cursos()
    {
        return $this->hasMany('App\Curso');
    }

}
