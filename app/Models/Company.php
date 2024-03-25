<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function setRootPasswordAttribute($rootPassword){
        $this->attributes['rootPassword'] = bcrypt($rootPassword);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function cards(){
        return $this->hasMany(Card::class);
    }
}
