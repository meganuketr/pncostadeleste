<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Ordentrabajo;
use App\Status;
use App\Historico;
use Illuminate\Support\Facades\Session;
use Collective\Http\Response;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


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
		$_ots = DB::table('ordentrabajo')
            ->join('status', 'ordentrabajo.status_id', '=', 'status.id')
            ->join('clientes', 'clientes.id', '=', 'ordentrabajo.cliente_id')
            ->select('ordentrabajo.*', 'status.nombre as status', 'clientes.nombre as nombrecliente')
            ->orderBy('ordentrabajo.fecha_ofrecida', 'asc')
            ->get();

           // $ots = Ordentrabajo::with('status', 'cliente')->get();//::orderBy('fecha_ofrecida', 'desc')->paginate();
		//$ots::orderBy('fecha_ofrecida', 'desc')->paginate();
		// dd($ots);
		$ots = new LengthAwarePaginator(
				$_ots,
				sizeof($_ots),
				15,
				null,
				['path' => Paginator::resolveCurrentPath()]);
		
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
		$ot = OrdenTrabajo::create($request->all());	
		Session::flash('flash_message', 'Record Created');
		
		$historico = new Historico();
		$historico->user_id = 1;
		$historico->operacion = 'Created';
		$historico->status_id = 1;
		$historico->ordentrabajo_id = $ot->id;
		$historico->save();
		
		return redirect('ordentrabajo');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$ordentrabajo =  OrdenTrabajo::findOrFail($id);
		return view('ordentrabajo.show',compact('ordentrabajo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ordentrabajo = OrdenTrabajo::findOrFail($id);
		return view('ordentrabajo.edit',compact('ordentrabajo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$ordentrabajo = OrdenTrabajo::findOrFail($id);
		$ordentrabajo->update($request->all());
		
		Session::flash('flash_message', 'Record Updated');
		
		return redirect('ordentrabajo');
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
		$ordentrabajo = OrdenTrabajo::findOrFail($id);
		$ordentrabajo->delete();
		
		if ($request->ajax()){
			return response()->json([
				'id' 		=> 	$ordentrabajo->id,
				'message' 	=> 	'Categoria deleted'
			]);
		}
		Session::flash('flash_message', 'Record Deleted');
	}

	/**
	 * Display the options to change status
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function changestatus($id)
	{
		$ordentrabajo =  OrdenTrabajo::findOrFail($id);
		$status = Status::lists('nombre', 'id');
		return view('ordentrabajo.changestatus',compact('ordentrabajo','status'));
	}
	
	public function storeStatusChange(Request $request){
		
		$ordentrabajo = OrdenTrabajo::findOrFail($request->ot_id);
		
		$historico = new Historico();
		$historico->user_id = 1;
		$historico->operacion = 'Cambio Status';
		$historico->status_id = $request->status_id;
		$historico->ordentrabajo_id = $request->ot_id;
		$historico->save();
		
		$ordentrabajo->status_id = $request->status_id;
		$ordentrabajo->save();
		Session::flash('flash_message', 'Record Updated');
		
		return redirect('ordentrabajo');
		
	}
	
	public function historicos($id){
		//$historicos = Historico::with('status')->get();
		$_historicos = DB::table('historicos')
            ->join('status', 'historicos.status_id', '=', 'status.id')
            ->join('users', 'historicos.user_id', '=', 'users.id')
            ->select('historicos.*', 'status.nombre as status', 'users.name as user')
            ->orderBy('historicos.created_at', 'asc')
            ->where('historicos.ordentrabajo_id', '=', $id)
            ->get();
		
            
            $historicos = new LengthAwarePaginator(
            		$_historicos,
            		sizeof($_historicos),
            		30,
            		null,
            		['path' => Paginator::resolveCurrentPath()]);
            
        return view('ordentrabajo.historico',compact('historicos'));
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
