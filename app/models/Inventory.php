<?php

class Inventory extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required|min:3',
        'brand' => 'required|min:2',
        'quantity' => 'required|numeric',
        'location' => 'required',
        'current_location' => 'required',
        'purchase_date' => 'required',
        'purchase_from' => 'required',
        'warranty_expiration' => 'required',
        'rental_price' => 'required|numeric',
        'organization_id' => 'required|numeric',
        'serial_numbers' => 'required',
	];

	// Don't forget to fill this array
	protected $fillable = [
        'name',
        'brand',
        'quantity',
        'location',
        'current_location',
        'purchase_date',
        'purchase_from',
        'warranty_expiration',
        'rental_price',
        'organization_id',
        'serial_numbers',
    ];

}