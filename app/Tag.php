<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $dates = ['generated_at'];

    public function users() {
        return $this->hasMany(User::class);
    }
}
