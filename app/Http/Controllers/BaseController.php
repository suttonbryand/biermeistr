<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 


class BaseController extends Controller{

	protected function getService(){
		include "Untappd/Untappd.php";
		return Untappd::getService();
	}

}

?>