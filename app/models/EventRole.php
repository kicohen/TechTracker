<?php

class EventRole extends \Eloquent {

    protected $table = 'events_roles';

    public static $rules = [
        'user_id' => 'required|exists:users,id',
        'role' => 'required',
        'event_id' => 'required|exists:events,id'
    ];

    // Don't forget to fill this array
    protected $fillable = [
        'user_id',
        'role',
        'event_id'
    ];
}