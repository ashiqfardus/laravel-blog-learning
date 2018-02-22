<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    protected $fillable=['user_id','avatar','youtube','facebook','about'];
}
