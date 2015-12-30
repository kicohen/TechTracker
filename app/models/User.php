<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    // Add your validation rules here
    public static $rules = [
        'email'     => 'required|email',
        'password'  => 'required|min:5',
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'group' => 'required|numeric',
    ];

    public static $update = [
        'email'     => 'required|email',
        'password'  => 'min:5',
        'current' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = [];

}
