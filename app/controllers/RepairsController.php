<?php

class RepairsController extends \BaseController {

	/**
	 * Display a listing of repairs
	 *
	 * @return Response
	 */
	public function index()
	{
		$repairs = Repair::all();

		return View::make('repairs.index', compact('repairs'));
	}

	/**
	 * Show the form for creating a new repair
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('repairs.create');
	}

	/**
	 * Store a newly created repair in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Repair::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Repair::create($data);

		return Redirect::route('repairs.index');
	}

	/**
	 * Display the specified repair.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$repair = Repair::findOrFail($id);

		return View::make('repairs.show', compact('repair'));
	}

	/**
	 * Show the form for editing the specified repair.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$repair = Repair::find($id);

		return View::make('repairs.edit', compact('repair'));
	}

	/**
	 * Update the specified repair in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$repair = Repair::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Repair::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$repair->update($data);

		return Redirect::route('repairs.index');
	}

	/**
	 * Remove the specified repair from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Repair::destroy($id);

		return Redirect::route('repairs.index');
	}

}
