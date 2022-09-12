<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use Notifiable, Sortable;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * The attributes that should be dates or timestamps
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'email_verified_at', 'birth_at', 'last_login'];

    public $sortable = ['member_code', 'last_name', 'indicative', 'club'];

    public function club() {
        return $this->belongsTo(Club::class);
    }

    public function tag() {
        return $this->hasOne(Tag::class);
    }
}
