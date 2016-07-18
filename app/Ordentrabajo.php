<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model {

	protected $table = 'ordentrabajo';
	
	protected $fillable = ['cliente_id', 'descripcion', 'fecha_ofrecida'];
/*	public function subject() {
		return $this->belongsTo('App\Subject');
	}
	
	public function objectives() {
		return $this->hasMany('App\Objective');
	}*/
	
	public function cliente() {
		return $this->belongsTo('App\Cliente');
	}
	
	public function status() {
		return $this->belongsTo('App\Status');
	}	

	public function historico() {
		return $this->hasMany('App\Historico');
	}
}
