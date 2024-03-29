<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['rule', 'contact', 'address'];

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
    public function rule()
    {
        return $this->belongsTo(Rule::class);
    }

    /**
     * Get the addresses about this user.
     *
     */
    public function address()
    {
        return $this->hasOne(UserAddress::class, 'user_id', 'id');
    }

    /**
     * Get the contacts about this user.
     *
     */
    public function contact()
    {
        return $this->hasOne(UserContact::class, 'user_id', 'id');
    }

    /**
     * Get the newsletter about this user.
     *
     */
    public function newsletter()
    {
        return $this->hasOne(Newsletter::class, 'user_id', 'id');
    }

    /**
     * Get the stock about this user.
     *
     */
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    /**
     * Scope a query to only customers.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCustomer($query)
    {
        return $query->where('rule_id', Rule::$_rule['CUSTOMER']);
    }

    /**
     * Scope a query to only employees.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEmployee($query)
    {
        return $query->whereIn('rule_id', [
            Rule::$_rule['ADMIN'],
            Rule::$_rule['EMPLOYEE']
        ])
        ->where('id', '<>', config('constants.DEVELOPER.ID'));
    }

    /**
     * Scope a query to only all users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAll($query)
    {
        return $query->whereIn('rule_id', [
            Rule::$_rule['ADMIN'],
            Rule::$_rule['EMPLOYEE'],
            Rule::$_rule['CUSTOMER']
        ])
        ->where('id', '<>', config('constants.DEVELOPER.ID'))
        ->with(['rule' => function ($subQuery)
        {
            $subQuery->orderBy('name');
        }]);
    }
}
