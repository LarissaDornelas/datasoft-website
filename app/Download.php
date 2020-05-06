<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $table = "downloads";

    public $timestamps = true;

    protected $fillable = [
        'id', 'title', 'description', 'link'
    ];
}
