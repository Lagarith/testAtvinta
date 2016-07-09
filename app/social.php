<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    protected $table = 'social_logins';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
