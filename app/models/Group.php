<?php

class Group extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required|min:3'
	];

	// Don't forget to fill this array
	protected $fillable = [
        'name',
    ];

}