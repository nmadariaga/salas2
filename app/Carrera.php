<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model {
	protected $table = 'carreras';
	protected $fillable = ['escuela_id','codigo','nombre','descripcion'];
	protected $guarded = ['id'];

public function escuela()
    {
        return $this->belongsTo('App\Escuela');
    }

public function estudiantes()
    {
        return $this->hasMany('App\Estudiante');
    }

    public function scopeName($query, $name)
    {
            //dd('scope: '.$name);
            if($name != "")
            {
            $query->where('nombre', ucwords($name));
            }
    }

}
