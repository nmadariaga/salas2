<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends \UTEM\Dirdoc\Auth\Models\DirdocWSUser {

	public function roles()
    {
        return $this->belongsToMany('App\Role', 'roles_usuarios', 'rut', 'rol_id');
    }

    public function estudiante()
    {
    	return $this->hasOne('App\Estudiante', 'rut', 'rut');
    }

}
