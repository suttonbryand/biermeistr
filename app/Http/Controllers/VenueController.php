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
	public function show($id)
	{
		include "Untappd/Pintlabs_Service_Untappd.php";
		$token = Session::get('UntappdAccessToken');
		$p = new Pintlabs_Service_Untappd(array("accessToken" => $token));
		//$response = $p->beerSearch("Stone+Smoked+Porter+w+Vanilla+Bean");
		//dd($response);
		$html = new \Htmldom('http://houston.taphunter.com/location/Hop-Scholar-Ale-House#tab_tap');
		$links = $html->find("div[id=tab_tap] a.title");
		foreach ($links as $l){
			$url = $l->href;
			$beer_clean = preg_replace("/^\/beer\/-?/","",$url);
			$beer_name = preg_replace("/-/"," ",$beer_clean);
			$beer_link = preg_replace("/-/","+",$beer_clean);
			$response = $p->beerSearch($beer_link);
			$had_beer = (sizeof($response->response->beers->items) > 0 && $response->response->beers->items[0]->have_had);
			$color = $had_beer ? "black" : "green";
			$had_beer_text = $had_beer ? "You've had it" : "You haven't had it!";
			echo "<div style='color:$color'>" . $beer_name . " :: " . $had_beer_text . "</div>";
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

}
