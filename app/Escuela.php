<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model {
	protected $table = 'escuelas';
	protected $fillable = ['nombre','departamento_id','descripcion'];
	protected $guarded = ['id'];

public function carreras()
    {
        return $this->hasMany('App\Carrera');
    }

public function departamento()
    {
        return $this->belongsTo('App\Departamento');
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
