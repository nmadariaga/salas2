<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model {
	protected $table = 'departamentos';
	protected $fillable = ['nombre','facultad_id','descripcion'];
	protected $guarded = ['id'];


    public function facultad()
    {
        return $this->belongsTo('App\Facultad');
    }

    public function asignaturas()
    {
        return $this->hasMany('App\Asignatura');
    }

    public function escuelas()
    {
        return $this->hasMany('App\Escuela');
    }

    public function docentes()
    {
        return $this->hasMany('App\Docente');
    }

    public function funcionarios()
    {
        return $this->hasMany('App\Funcionario');
    }

    public function scopeName($query, $name)
    {
            //dd('scope: '.$name);
            if($name != "")
            {
            $query->where('nombre', "like" ,"%$name%");
            }
    }
}
