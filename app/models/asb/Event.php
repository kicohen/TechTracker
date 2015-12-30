<?php

namespace asb;

class Event extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
        'title' => 'required|min:3',
        'organization_id' => 'required|exists:groups,id',
        'status' => 'required',
        'contact_email' => 'required|email',
        'contact_phone',
        'contact_name',
        'publish' => 'required',
        'rental',
        'notes',
        'billable',
	];

	// Don't forget to fill this array
	protected $fillable = [
        'title',
        'organization_id',
        'status',
        'contact_email',
        'contact_phone',
        'contact_name',
        'publish',
        'rental',
        'notes',
        'billable',
    ];

}