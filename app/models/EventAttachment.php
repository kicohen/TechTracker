<?php

class EventAttachment extends \Eloquent {
    protected $table = 'events_attachments';

    protected $fillable = [
        'event_id',
        'path',
        'name',
        'local_path'
    ];

    public static $rules = [
        'event_id' => 'required|exists:events,id',
        'file' => 'required',
        'name' => 'required|min:3|max:255',
    ];
}