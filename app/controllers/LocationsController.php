<?php

class LocationsController extends \BaseController {

    /**
     * Store a newly created inventory in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), EventLocation::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        EventLocation::create($data);

        return Redirect::route('events.index');
    }

}