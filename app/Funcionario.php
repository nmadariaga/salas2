<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model {

	protected $table = 'funcionarios';
	protected $fillable = ['departamento_id','rut','nombres','apellidos'];
	protected $guarded = ['id'];

public function departamento ()
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
