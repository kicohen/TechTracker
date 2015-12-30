<?php

class CommentsController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 * POST /comments
	 *
	 * @return Response
	 */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), EventComment::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data['user_id'] = Sentry::getUser()->id;

        EventComment::create($data);

        return Redirect::route('events.index');
    }
}