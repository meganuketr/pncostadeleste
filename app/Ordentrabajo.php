<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model {

	protected $table = 'ordentrabajo';
	
	//protected $fillable = ['nombre', 'precio', 'minimo', 'categoria_id'];
/*	public function subject() {
		return $this->belongsTo('App\Subject');
	}
	
	public function objectives() {
		return $this->hasMany('App\Objective');
	}*/
	
	public function cliente() {
		return $this->belongsTo('App\Cliente');
	}
	

}
