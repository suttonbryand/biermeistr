<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VenueController extends Controller {

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
	public function show($city,$name)
	{
		try{
		include "Untappd/Pintlabs_Service_Untappd.php";
		$token = Session::get('UntappdAccessToken');
		try{
			$p = new Pintlabs_Service_Untappd(array("accessToken" => $token));
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
						$unhad_beers[] = $beer;
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
		return view('venue.menu')
				->with('unhad_beers',$unhad_beers)
				->with('had_beers',$had_beers)
				->with('not_found_beers',$not_found_beers)
				->with('error',$error)	;	
		}
		catch(\Exception $e){
			return view('venue.menu')->with('error',$e->getMessage())->with('unhad_beers',array())
				->with('had_beers',array())
				->with('not_found_beers',array());
		}
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
		return view('venue.city')->with('city',$city)->with('urls',$urls);
	}

}
