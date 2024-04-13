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

    public function index(){
        return view('documentation.index', [
            'base_add' => 'https://127.0.0.1:8000/',
        ]);
    }
}
