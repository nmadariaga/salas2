<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Rolusuario extends Model {

	protected $table = 'roles_usuarios';
	protected $fillable = ['rut', 'rol_id'];
	protected $guarded = ['id'];


public function rol()
    {
        return $this->belongsTo('App\Role');
    }

public function scopeName($query, $name)
    {
            //dd('scope: '.$name);
            if($name != "")
            {
            $query->where('rut',$name);
            }
    }

}
