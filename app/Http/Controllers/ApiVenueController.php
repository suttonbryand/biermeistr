<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 

class ApiVenueController extends AbstractVenueController {

	public function show($city,$name){
		return $this->jsonResponse(parent::show($city,$name));
	}

	public function city(Request $request){
		return $this->jsonResponse(parent::city($request));
	}


}

