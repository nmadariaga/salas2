<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model {

	protected $table = 'periodos';
	protected $fillable = ['bloque', 'inicio', 'fin'];
	protected $guarded = ['id'];



public function horario()
    {
        return $this->belongsTo('App\Horario');
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
