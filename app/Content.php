<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = "content";

    public $timestamps = true;

    protected $fillable = [
        'id', 'name', 'text'
    ];
}
