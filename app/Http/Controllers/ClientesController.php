<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\Session;
use Collective\Http\Response;


class ClientesController extends Controller {

	
	public function __construct() {
		
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clientes = Cliente::paginate();
		return view('clientes.index', compact('clientes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clientes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		Cliente::create($request->all());	
		Session::flash('flash_message', 'Record Created');
		return redirect('clientes');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cliente =  Cliente::findOrFail($id);
		return view('clientes.show',compact('cliente'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cliente = Cliente::findOrFail($id);
		return view('clientes.edit',compact('cliente'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$cliente = Cliente::findOrFail($id);
		$cliente->update($request->all());
		
		Session::flash('flash_message', 'Record Updated');
		
		return redirect('clientes');
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
		$cliente = Cliente::findOrFail($id);
		$cliente->delete();
		
		if ($request->ajax()){
			return response()->json([
				'id' 		=> 	$cliente->id,
				'message' 	=> 	'Cliente deleted'
			]);
		}
		Session::flash('flash_message', 'Record Deleted');
	}

/*	
	public function units($id, Request $request) {
		if ($request->ajax())
        {
        	$Cliente = Cliente::findOrFail($id);
            $units = $Cliente->units;
      //     return 'fyou';
    //        dd($units);
            return response()->json( $units );
         //   return response()->json(array('name' => 'Steve', 'state' => 'CA'));
        } 
	}*/
}
