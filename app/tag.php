<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable=['tag'];
    public function posts()
    {
        return $this->belongsTo('App\Post');
    }
}
