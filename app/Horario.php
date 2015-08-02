<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model {

	protected $table = 'horarios';
	protected $fillable = ['fecha','sala_id', 'periodo_id', 'curso_id'];
	protected $guarded = ['id'];


    public function sala()
    {
        return $this->belongsTo('App\Sala');
    }

    public function periodo()
    {
        return $this->hasMany('App\Periodo');
    }

    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }

    public function scopeName($query, $name)
    {
            //dd('scope: '.$name);
            if($name != "")
            {
            $query->where('fecha', ucwords($name));
            }
    }
}
