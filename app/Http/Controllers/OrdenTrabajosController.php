<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Ordentrabajo;
use Illuminate\Support\Facades\Session;
use Collective\Http\Response;


class OrdenTrabajosController extends Controller {

	
	public function __construct() {
		
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ots = Ordentrabajo::orderBy('fecha_ofrecida', 'desc')->paginate();
		return view('ordentrabajo.index', compact('ots'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('ordentrabajo.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		Categoria::create($request->all());	
		Session::flash('flash_message', 'Record Created');
		return redirect('categorias');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$categoria =  Categoria::findOrFail($id);
		return view('categorias.show',compact('categoria'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$categoria = Categoria::findOrFail($id);
		return view('categorias.edit',compact('categoria'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$categoria = Categoria::findOrFail($id);
		$categoria->update($request->all());
		
		Session::flash('flash_message', 'Record Updated');
		
		return redirect('categorias');
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
		$categoria = Categoria::findOrFail($id);
		$categoria->delete();
		
		if ($request->ajax()){
			return response()->json([
				'id' 		=> 	$categoria->id,
				'message' 	=> 	'Categoria deleted'
			]);
		}
		Session::flash('flash_message', 'Record Deleted');
	}

/*	
	public function units($id, Request $request) {
		if ($request->ajax())
        {
        	$categoria = Categoria::findOrFail($id);
            $units = $categoria->units;
      //     return 'fyou';
    //        dd($units);
            return response()->json( $units );
         //   return response()->json(array('name' => 'Steve', 'state' => 'CA'));
        } 
	}*/
}
