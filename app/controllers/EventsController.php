<?php

class EventsController extends \BaseController {

	/**
	 * Display a listing of events
	 *
	 * @return Response
	 */
	public function index()
	{
		$events = \asb\Event::all();

		return View::make('events.index', compact('events'));
	}

	/**
	 * Show the form for creating a new event
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('events.create');
	}

	/**
	 * Store a newly created event in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), \asb\Event::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        \asb\Event::create($data);

		return Redirect::route('events.index');
	}

	/**
	 * Display the specified event.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$event = \asb\Event::findOrFail($id);
        $roles = EventRole::where('event_id', '=', $event->id)->get();
        $dates = EventDate::where('event_id', '=', $event->id)->get();
        $attachments = EventAttachment::where('event_id', '=', $event->id)->get();
        $comments = EventComment::where('event_id', '=', $event->id)->get();

		return View::make('events.show', compact('event', 'roles', 'dates', 'attachments', 'comments'));
	}

	/**
	 * Show the form for editing the specified event.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$event = \asb\Event::find($id);

		return View::make('events.edit', compact('event'));
	}

	/**
	 * Update the specified event in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$event = \asb\Event::findOrFail($id);

		$validator = Validator::make($data = Input::all(), \asb\Event::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$event->update($data);

		return Redirect::route('events.index');
	}

	/**
	 * Remove the specified event from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        \asb\Event::destroy($id);

		return Redirect::route('events.index');
	}

}
