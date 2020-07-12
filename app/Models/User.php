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
		'id',
		'rule_id',
		'name',
		'email',
		'password',
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
	// public function sendPasswordResetNotification($token)
	// {
	// 	$this->notify(new ResetPassword($token));
	// }

	/**
	 * Get the rule that owns the user.
	 *
	 */
	public function rules()
	{
		return $this->belongsTo(Rule::class);
	}

	/**
	 * Get the addresses about this user.
	 *
	 */
	public function addresses()
	{
		return $this->hasMany(UserAddress::class, 'user_id', 'id');
	}

	/**
	 * Get the contacts about this user.
	 *
	 */
	public function contacts()
	{
		return $this->hasMany(UserContact::class, 'user_id', 'id');
	}

	/**
	 * Get the newsletter about this user.
	 *
	 */
	public function newsletter()
	{
		return $this->hasMany(Newsletter::class, 'user_id', 'id');
	}

	/**
	 * Get the stock about this user.
	 *
	 */
	public function stock()
	{
		return $this->hasMany(Stock::class);
	}
}
