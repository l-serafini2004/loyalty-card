<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerControllerAPI extends Controller
{
    public function store(){
        $attributes = request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => ['required', 'email', 'unique:customers'],
            'customer_number' => 'required'
        ]);

        $customer = Customer::create($attributes);

        return response()->json([
            $customer,
        ]);

    }
}
