<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssociationResource;
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

    public function show(){
        $email = request('email');

        $customer = Customer::query()
            ->select('customers.email', 'customers.name', 'customers.surname', 'associations.card_number', 'associations.point', 'cards.cardName')
            ->join('associations', 'associations.customer_id', '=', 'customers.id')
            ->join('cards', 'cards.id', '=', 'associations.card_id')
            ->where('cards.company_id', '=', auth()->user()->company_id)
            ->where('customers.email', '=', $email)
            ->get();

        return AssociationResource::collection($customer);
    }
}
