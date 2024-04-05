<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function api(){
        return view('documentation.api', [
            'user' => auth()->user(),
        ]);
    }
}
