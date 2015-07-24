<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model {

	protected $table = 'horarios';
	protected $fillable = ['fecha','sala_id', 'periodo_id', 'curso_id'];
	protected $guarded = ['id'];


    public function salas()
    {
        return $this->hasMany('App\Sala');
    }

    public function periodos()
    {
        return $this->hasMany('App\Periodo');
    }

    public function cursos()
    {
        return $this->hasMany('App\Curso');
    }


}
