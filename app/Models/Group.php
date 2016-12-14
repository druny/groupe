<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

     protected $fillable = [
        'name', 'description', 'role',
    ];


    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
    public function scopeId(Builder $query, $id) {
        return $query->where('id', $id)->firstOrFail();
    }
}
