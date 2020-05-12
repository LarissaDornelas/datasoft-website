<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";

    public $timestamps = true;

    protected $fillable = [
        'id', 'name', 'email', 'phone'
    ];
}
