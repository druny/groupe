<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        'name', 'email', 'password', 'second_name', 'phone', 'cellphone'
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groups() {
        return $this->belongsToMany('App\Models\Group');
    }
    public function scopeId($query, $id) {

        return $query->where('id', $id)->firstOrFail();
    }
}
