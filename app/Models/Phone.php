<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(function($phone)
        {
            $phone->number = 'Unknown';
        });
    }
}
