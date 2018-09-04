<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'users_data';

    protected $fillable = [
        'user_id',
        'image_id',
        'phones',
        'addresses',
        'company',
        'other_data',
        'subscribe'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function image()
    {
        return $this->belongsTo('App\Models\Image');
    }

    public function addresses()
    {
        return json_decode($this->addresses);
    }

    public function phones()
    {
        return json_decode($this->phones);
    }
}
