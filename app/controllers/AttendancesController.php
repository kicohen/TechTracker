<?php

class AttendancesController extends \BaseController {

	/**
	 * Display a listing of attendances
	 *
	 * @return Response
	 */
	public function index()
	{
        if(!Sentry::getUser()){ return Redirect::route('sessions.create'); }

		$attendances = Attendance::where('user_id', '=', Sentry::getUser()->id)->get();

		return View::make('attendances.index', compact('attendances'));
	}

	/**
	 * Show the form for creating a new attendance
	 *
	 * @return Response
	 */
	public function create()
	{
        if(!Sentry::getUser()){ return Redirect::route('sessions.create'); }

		return View::make('attendances.create');
	}

	/**
	 * Store a newly created attendance in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        if(!Sentry::getUser()){ return Redirect::route('sessions.create'); }

		$validator = Validator::make($data = Input::all(), Attendance::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['date'] = strtotime($data['date']);
        $data['user_id'] = Sentry::getUser()->id;

		Attendance::create($data);

		return Redirect::route('attendances.index');
	}

	/**
	 * Remove the specified attendance from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if(!Sentry::getUser()){ return Redirect::route('sessions.create'); }

		Attendance::destroy($id);
	}

    /**
     * Approve the specified attendance
     *
     * @param $id
     * @return mixed
     */
    public function approve($id){
        if(!Sentry::getUser()){ return Redirect::route('sessions.create'); }

        $a = Attendance::find($id);
        if($a->approved == 0)
        {
            $a->approved = 1;
        }elseif($a->approved == 1)
        {
            $a->approved = 2;
        }
        $a->save();

        return Redirect::route('attendances.index');
    }

}
