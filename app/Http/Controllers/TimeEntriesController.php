<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TimeEntry;

use Illuminate\Support\Facades\Request;


class TimeEntriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	// Gets all the entries and eager loads their associated users
	public function index()
	{
		
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
	 * @param  $url
	 * @return Response
	 */

	// Grab all the data passed into the request and save a new record
	public function store()
	{
		
		//Get URL in Request
		$url = Request::input('url');

		//If URL is empty, RETURN
		if (!$url) {
			return 'Please pass a url to continue!';
		}

		//Parse URL to get the DATA TYPE
		parse_str($url, $params);

		//IF datatype is XML
		if ($params['type'] == 'xml') {

			//Extract file contents from url
		    $data = file_get_contents($url);
			$xml = simplexml_load_string($data, "SimpleXMLElement", LIBXML_NOCDATA);

			//CONVERT xml to json
			$json = json_encode($xml);
			$array = json_decode($json,TRUE);

		} elseif ($params['type'] == 'json') {

			//Extract file contents from url
		    $array = file_get_contents($url);
			
		}
		
		//RETURN result
		return $array;
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

	// Grab all the data passed into the request and fill the database record with the new data
	public function update($id)
	{
		

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	// Find the time entry to be deleted and then call delete
	public function destroy($id)
	{
		

	}

}