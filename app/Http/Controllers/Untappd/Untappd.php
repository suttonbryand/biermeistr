<?php namespace App\Http\Controllers;

class Untappd{
	

	public static function getService($arguments = array()){
		static $_untappd;
		if(is_null($_untappd)){
			if(getenv('APP_ENV') == 'dev'){
				include('Pintlabs_Service_Untappd_Test.php');
			}
			else{
				include('Pintlabs_Service_Untappd.php');
			}
			$_untappd = new Pintlabs_Service_Untappd($arguments);
		}
		return $_untappd;
	}
}

?>