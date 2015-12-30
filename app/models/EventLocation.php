<?php

class EventLocation extends \Eloquent {
    protected $table = 'events_locations';

    protected $fillable = [
        'date_id',
        'name',
    ];

    public static $rules = [
        'date_id' => 'required|exists:events_dates,id',
        'name' => 'required|min:3',
    ];
}