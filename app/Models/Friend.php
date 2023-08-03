<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Friend extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function friend()
    {
        return $this->belongsTo(User::class);
    }

    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'friend_id',
        'status',
    ];
}
