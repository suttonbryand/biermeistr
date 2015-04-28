<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function login(){
		include "Untappd/Pintlabs_Service_Untappd.php";
		$p = new Pintlabs_Service_Untappd();
		return redirect($p->authenticateURI());
	}

	public function loginCode(Request $request){
		include "Untappd/Pintlabs_Service_Untappd.php";
		$p = new Pintlabs_Service_Untappd();
		$code = $request->input('code');
		$token = $p->getAccessToken($code);
		Session::put('UntappdAccessToken',$token);
		return redirect('venues/hop+schole+ale+house');
	}

}
