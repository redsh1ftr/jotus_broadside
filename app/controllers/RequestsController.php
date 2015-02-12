<?php

class RequestsController extends \BaseController {

	/**
	 * Display a listing of requests
	 *
	 * @return Response
	 */
	public function index()
	{
		$requests = Request::all();

		return View::make('requests.index', compact('requests'));
	}

	/**
	 * Show the form for creating a new request
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('requests.create');
	}

	/**
	 * Store a newly created request in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Request::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Request::create($data);

		return Redirect::route('requests.index');
	}

	/**
	 * Display the specified request.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$request = Request::findOrFail($id);

		return View::make('requests.show', compact('request'));
	}

	/**
	 * Show the form for editing the specified request.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$request = Request::find($id);

		return View::make('requests.edit', compact('request'));
	}

	/**
	 * Update the specified request in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$request = Request::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Request::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$request->update($data);

		return Redirect::route('requests.index');
	}

	/**
	 * Remove the specified request from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Request::destroy($id);

		return Redirect::route('requests.index');
	}

}
