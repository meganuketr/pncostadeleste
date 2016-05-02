<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model {

	protected $table = 'materiales';

	protected $fillable = ['nombre', 'precio', 'minimo', 'categoria_id'];

	public function categoria() {
		return $this->belongsTo('App\Categoria');
	}
}