<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 


abstract class BaseController extends Controller{

	protected function getService(){
		include "Untappd/Untappd.php";
		return Untappd::getService();
	}

	protected function jsonResponse($response, $status = 200){
		header("Content-type:application/json");
		return array("meta" => array("status" => $status), "response" => $response);
	}

}

?>