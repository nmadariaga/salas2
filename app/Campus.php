<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model {
	protected $table = 'campus';
	protected $fillable = ['nombre','direccion','latitud','longitud','descripcion','rut_encargado'];
	protected $guarded = ['id'];

public function facultades()
    {
        return $this->hasMany('App\Facultad');
    }

    public function salas()
    {
        return $this->hasMany('App\Sala');
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
