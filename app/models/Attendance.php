<?php


class Attendance extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
        'date' => 'required',
        'period' => 'required|numeric',
        'reason' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
        'date',
        'period',
        'reason',
        'user_id'
    ];

}