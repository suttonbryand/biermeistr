<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 


abstract class AbstractVenueController extends BaseController {

	public function show($city,$name){
		$token = Session::get('UntappdAccessToken');
		try{
			$p = $this->getService(array("accessToken" => $token));
			//$response = $p->beerSearch("Stone+Smoked+Porter+w+Vanilla+Bean");
			//dd($response);
			$html = new \Htmldom("http://" . strtolower($city) . ".taphunter.com/location/" . $name . "#tab_tap");
			$links = $html->find("div[id=tab_tap] a.title");
			$unhad_beers = array();
			$had_beers = array();
			$not_found_beers = array();
		}
		catch(Pintlabs_Service_Untappd_Exception $e){
			return view('error')->with('error',$e->getMessage());
		}
		$error = false;			
		foreach ($links as $l){
			try{
				$url = $l->href;
				$beer_clean = preg_replace("/^\/beer\/-?/","",$url);
				$beer_name = preg_replace("/-/"," ",$beer_clean);
				$beer_link = preg_replace("/-/","+",$beer_clean);
				$response = $p->beerSearch($beer_link);
				if(sizeof($response->response->beers->items) > 0){
					$beer = $response->response->beers->items[0];
					if($beer->have_had){
						$had_beers[] = $beer;
					}
					else{
						$type = $beer->beer->beer_style;
						if(!in_array($type,$unhad_beers)){
							$unhad_beers[$type] = array();
						}						
						$unhad_beers[$type][] = $beer;
					}
				}
				else{
					$not_found_beers[] = $beer_name;
				}
			}
			catch(Pintlabs_Service_Untappd_Exception $e){
				$error = $e->getMessage();
				break;
			}	
		}

		return array('unhad_beers' => $unhad_beers,
				'had_beers'=> $had_beers,
				'not_found_beers' => $not_found_beers,
				'error'=> $error
			);
	}

	public function city(Request $request){
		$city = $request->input('c');
		$cities_link = "http://" . strtolower($city) . ".taphunter.com/location/";
		$html = new \Htmldom($cities_link);
		$links = $html->find(".title a");
		$urls = array();
		foreach ($links as $l){
			$url = $l->href;
			$urls[] = array(preg_replace('/\/location\//','/venues/' . $city . '/',$url),$l->innertext);
		}
		usort($urls, function($a, $b){
			$v1 = $a[0];
			$v2 = $b[0];

			if($v1 == $v2) return 0;

			return $v1 < $v2 ? -1 : 1;
		});
		return array('city' => $city, 'urls' => $urls);		
	}

}