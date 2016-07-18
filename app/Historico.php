<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
	protected $table = 'historicos';

	//protected $fillable = ['user_id', 'ordentrabajo_id', 'previous_status_id', 'status_id'];

	public function ordentrabajo() {
		return $this->belongsTo('App\Ordentrabajo');
	}
	public function status() {
		return $this->belongsTo('App\Status');
	}
}