<?php

class DatesController extends \BaseController {

    /**
     * Store a newly created inventory in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), EventDate::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data['startdate'] = strtotime($data['startdate']);
        $data['calldate'] = strtotime($data['calldate']);
        $data['enddate'] = strtotime($data['enddate']);
        $data['strikedate'] = strtotime($data['strikedate']);

        $location = $data['name'];
        unset($data['name']);

        $date = EventDate::create($data);

        EventLocation::create([
            'date_id' => $date->id,
            'name' => $location
        ]);

        return Redirect::route('events.index');
    }

}