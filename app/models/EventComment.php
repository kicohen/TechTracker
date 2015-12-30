<?php

class EventComment extends \Eloquent {
    protected $table = 'events_comments';

    protected $fillable = [
        'user_id',
        'event_id',
        'comment',
    ];

    public static $rules = [
        'event_id' => 'required|exists:events,id',
        'comment' => 'required|min:3',
    ];
}