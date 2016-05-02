<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Material;
use App\Categoria;
use Illuminate\Support\Facades\Session;
use Collective\Http\Response;


class MaterialesController extends Controller {

	
	public function __construct() {
		
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$materiales = Material::paginate();
		return view('materiales.index', compact('materiales'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categorias = Categoria::lists('nombre', 'id');
		return view('materiales.create', compact('categorias'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		Material::create($request->all());	
		Session::flash('flash_message', 'Record Created');
		return redirect('materiales');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$material =  Material::findOrFail($id);
		return view('materiales.show',compact('material'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$material = Material::findOrFail($id);
		$categorias = Categoria::lists('nombre', 'id');
		return view('materiales.edit', compact('material','categorias'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$material = Material::findOrFail($id);
		$material->update($request->all());
		
		Session::flash('flash_message', 'Record Updated');
		
		return redirect('materiales');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		//return $id;
		
	//	$session->flash('flash_message', 'Record Deleted');
		$material = Material::findOrFail($id);
		$material->delete();
		
		if ($request->ajax()){
			return response()->json([
				'id' 		=> 	$material->id,
				'message' 	=> 	'Material deleted'
			]);
		}
		Session::flash('flash_message', 'Record Deleted');
	}

/*	
	public function units($id, Request $request) {
		if ($request->ajax())
        {
        	$Material = Material::findOrFail($id);
            $units = $Material->units;
      //     return 'fyou';
    //        dd($units);
            return response()->json( $units );
         //   return response()->json(array('name' => 'Steve', 'state' => 'CA'));
        } 
	}*/
}
