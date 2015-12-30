<?php

class EventDate extends \Eloquent {
    protected $table = 'events_dates';

	protected $fillable = [
        'event_id',
        'calldate',
        'startdate',
        'enddate',
        'strikedate',
        'description',
        'notes'
    ];

    public static $rules = [
        'event_id' => 'required|exists:events,id',
        'description' => 'required|min:2',
        'calldate',
        'startdate' => 'required',
        'enddate' => 'required',
        'strikedate',
    ];
}