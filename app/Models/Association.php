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

    public function scopeFilter($query, array $filters){

        $query->when($filters['name'] ?? false, fn($query, $search) =>
            $query->where('customers.name', 'like', '%' . $search . '%'),
        );

        $query->when($filters['surname'] ?? false, fn($query, $search) =>
            $query->where('customers.surname', 'like', '%' . $search . '%'),
        );

        $query->when($filters['email'] ?? false, fn($query, $search) =>
            $query->where('customers.email', 'like', '%' . $search . '%'),
        );

        $query->when($filters['point'] ?? false, fn($query, $search) =>
            $query->where('associations.point', '=' , $search),
        );

        $query->when($filters['card'] ?? false, fn($query, $search) =>
            $query->where('cards.id', '=' , $search),
        );


    }

    public function cards(){
        return $this->hasMany(Card::class);
    }

    public function associations(){
        return $this->hasMany(Association::class);
    }

}
