<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipodesala extends Model {

	protected $table = 'tipos_salas';
	protected $fillable = ['nombre','descripcion'];
	protected $guarded = ['id'];


public function sala()
    {
        return $this->belongsTo('App\Sala');
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
