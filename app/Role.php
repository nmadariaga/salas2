<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	protected $table = 'roles';
	protected $fillable = ['nombre', 'descripcion'];
	protected $guarded = ['id'];


public function rolusuario()
    {
        return $this->belongsTo('App\Rolusuario');
    }

public function usuarios()
    {
        return $this->belongsToMany('App\Usuario', 'roles_usuarios', 'rol_id', 'rut');
    }


}
