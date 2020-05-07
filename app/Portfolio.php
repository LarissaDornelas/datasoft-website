<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = "portfolio";

    public $timestamps = true;

    protected $fillable = [
        'id', 'image_url', 'title', 'text'
    ];
}
