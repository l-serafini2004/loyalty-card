<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Card;
use App\Models\Customer;
use Illuminate\Support\Facades\App;

class Association extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cards(){
        return $this->hasMany(Card::class);
    }

    public function associations(){
        return $this->hasMany(Association::class);
    }

}
