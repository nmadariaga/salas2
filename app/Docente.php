<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model {

	protected $table = 'docentes';
	protected $fillable = ['departamento_id','rut','nombres','apellidos'];
	protected $guarded = ['id'];


    public function cursos()
    {
        return $this->hasMany('App\Curso');
    }

    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }


}
