<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Exception;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_rule_id',
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
		return $this->belongsTo(UserRule::class, 'user_rule_id');
	}

	/**
	 * Get the customers about this user.
	 *
	 */
	public function customers()
	{
		return $this->hasMany(Customer::class);
	}

	/**
	 * Get the employees about this user.
	 *
	 */
	public function employees()
	{
		return $this->hasMany(Employee::class);
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
