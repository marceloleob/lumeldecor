<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
		'rule',
		'status',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	/**
	 * Send the password reset notification.
	 *
	 * @param  string  $token
	 * @return void
	 */
	public function sendPasswordResetNotification($token)
	{
		$this->notify(new ResetPassword($token));
	}

	/**
	 * Get the customer about this user.
	 *
	 */
	public function customer()
	{
		return $this->hasOne('App\Models\Customer');
	}

	/**
	 * The attributes that should be rules.
	 *
	 * @var array
	 */
	public static $rules = [
		'ADMIN'    => 1, // ADMINISTRATOR
		'SELLER'   => 2, // VENDEDOR
		'SUPPLIER' => 3, // VENDEDOR
		'CUSTOMER' => 4, // CLIENTE
	];
}
