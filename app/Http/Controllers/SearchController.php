<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Response;

class SearchController extends Controller {
	public function autocomplete(){
		$term = Input::get('term');
	
		$results = array();
	
		$queries = DB::table('clientes')
		->where('nombre', 'LIKE', '%'.$term.'%')
		->take(10)->get();
	
		foreach ($queries as $query)
		{
			$results[] = [ 'id' => $query->id, 'value' => $query->nombre ];
		}
		return Response::json($results);
	}
	
/*	public function autocompletebyid(){
		$term = Input::get('term');
	
		$results = array();
	
		$queries = DB::table('clientes')
		->where('id', 'LIKE', '%'.$term.'%')
		->take(10)->get();
	
		foreach ($queries as $query)
		{
			$results[] = [ 'id' => $query->id, 'nombre' => $query->nombre ];
		}
		return Response::json($results);
	}*/
}