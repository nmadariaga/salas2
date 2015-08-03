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

		public function horarios()
		    {
		        return $this->hasMany('App\Horario');
		    }

    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

		public function usuario()
		{
			return $this->belongsTo('App\Usuario', 'rut');
		}


    public function scopeName($query, $name)
    {
            //dd('scope: '.$name);
            if($name != "")
            {
            $query->where('nombres', "like" ,"%$name%");
            }
    }


}
