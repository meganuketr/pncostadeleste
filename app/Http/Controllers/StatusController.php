<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Status;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;


class StatusController extends Controller {

	
	public function __construct() {
		
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$status = Status::paginate();
		return view('status.index', compact('status'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('status.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\StatusRequest $request)
	{
		Status::create($request->all());	
		Session::flash('flash_message', 'Record Created');
		return redirect('status');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$status =  Status::findOrFail($id);
		return view('status.show',compact('status'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$status = Status::findOrFail($id);
		return view('status.edit',compact('status'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Requests\StatusRequest $request)
	{
		$status =  Status::findOrFail($id);
		$status->update($request->all());
		
		Session::flash('flash_message', 'Record Updated');
		
		return redirect('status');
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
		$status = Status::findOrFail($id);
		$status->delete();
		
		if ($request->ajax()){
			return response()->json([
				'id' 		=> 	$status->id,
				'message' 	=> 	'Status deleted'
			]);
		}
		Session::flash('flash_message', 'Record Deleted');
	}

/*	
	public function units($id, Request $request) {
		if ($request->ajax())
        {
        	$Status = Status::findOrFail($id);
            $units = $Status->units;
      //     return 'fyou';
    //        dd($units);
            return response()->json( $units );
         //   return response()->json(array('name' => 'Steve', 'state' => 'CA'));
        } 
	}*/
}
