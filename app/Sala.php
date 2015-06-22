<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model {

	protected $table = 'salas';
	protected $fillable = ['campus_id','tipo_sala_id','nombre','descripcion'];
	protected $guarded = ['id'];


public function campus()
    {
        return $this->belongsTo('App\Campus');
    }

public function horario()
    {
        return $this->belongsTo('App\Horario');
    }


public function tiposala()
    {
        return $this->hasOne('App\Tipodesala');
    }
}


