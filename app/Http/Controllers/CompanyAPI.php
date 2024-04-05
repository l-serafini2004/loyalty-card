<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyAPI extends Controller
{
    // Funzione
    public function ciao(){
        return [
            'Nome' => 'Luca',
            'Cognome' => 'Serafini'
        ];
    }
}
