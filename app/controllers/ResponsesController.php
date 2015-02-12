<?php

class ResponsesController extends \BaseController {

	/**
	 * Display a listing of responses
	 *
	 * @return Response
	 */
	public function index()
	{
		$responses = Response::all();

		return View::make('responses.index', compact('responses'));
	}

	/**
	 * Show the form for creating a new response
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('responses.create');
	}

	/**
	 * Store a newly created response in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Response::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Response::create($data);

		return Redirect::route('responses.index');
	}

	/**
	 * Display the specified response.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$response = Response::findOrFail($id);

		return View::make('responses.show', compact('response'));
	}

	/**
	 * Show the form for editing the specified response.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$response = Response::find($id);

		return View::make('responses.edit', compact('response'));
	}

	/**
	 * Update the specified response in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$response = Response::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Response::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$response->update($data);

		return Redirect::route('responses.index');
	}

	/**
	 * Remove the specified response from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Response::destroy($id);

		return Redirect::route('responses.index');
	}

}
