<?php namespace App\Http\Controllers;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 

class UserController extends BaseController {

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
		return redirect($this->getService()->authenticateURI());
	}

	public function loginCode(Request $request){
		try{
			$p = $this->getService();
			$code = $request->input('code');
			$token = $p->getAccessToken($code);
			$user_info = $p->userInfo();
			$first_name = $user_info->response->user->first_name;
			Session::put('UntappdAccessToken',$token);
			Session::put('user_first_name',$first_name);
			return redirect('/');
		}
		catch(Pintlabs_Service_Untappd_Exception $e){
			return view('error')->with('error',$e->getMessage());
		}
	}

	public function logout(){
		Session::flush();
		return redirect('/');
	}

}
