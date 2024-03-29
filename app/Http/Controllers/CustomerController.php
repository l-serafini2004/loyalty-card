<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create(){
        return view('customers.create');
    }


    public function store(){
        $attributes = request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|unique:customers',
        ]);

        Customer::create($attributes);

        return redirect('/admin')->with('success', 'Account created successfully');
    }

}
