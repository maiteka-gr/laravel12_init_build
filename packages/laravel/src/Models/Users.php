<?php

namespace Laravel\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends BaseModel{
    use SoftDeletes;

    protected $table = 'users';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
