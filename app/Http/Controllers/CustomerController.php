<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Card;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;
class CustomerController extends Controller
{

    public function index(){

        // Controlla se ci sono degli input
        if(empty(request()->input('email'))) return view('customers.show');
        else{
            $cards = Customer::query()
                ->select('associations.*', 'cards.*', 'customers.*')
                ->join('associations', 'associations.customer_id', '=', 'customers.id')
                ->join('cards', 'cards.id', '=', 'associations.card_id')
                ->where('customers.email', '=', request()->input('email'))
                ->get();

            return view('customers.show', [
                'cards' => $cards,
            ]);
        }



    }

    public function create(){
        return view('customers.create');
    }


    public function store(){
        $attributes = request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'customer_number' => 'required',
            'email' => 'required|unique:customers',
        ]);

        Customer::create($attributes);

        return redirect('/admin')->with('success', 'Account created successfully');
    }

    public function modify(){

        // Cerca le carte che ci interessano
        $cards = Card::query()
            ->where('company_id', '=', auth()->user()->company_id);


        return view('customers.update', [
            'cards' => $cards->get(),
        ]);
    }

    public function update(){

        $map = [
            'free' => 500,
            'premium' => 1500,
            'business' => 5000,
        ];

        // Controllo il numero massimo di associazioni (se raggiunto esco)
        $nAcc = Association::query()
                ->join('cards', 'cards.id', '=', 'associations.card_id')
                ->where('cards.company_id', '=', auth()->user()->company_id)
                ->count();

        if($nAcc === $map[auth()->user()->company->plan]){
            throw ValidationException::withMessages([
                'email' => 'There are too many associations, update your plan!',
            ]);
        }

        // Controllo che l'utente esista
        $existUser = Customer::query()
            ->where('email', '=', request()->input('email'))
            ->get();

        if(empty($existUser[0])){
            throw ValidationException::withMessages([
                'email' => 'The user does not exists'
            ]);
        }

        // Controlla che l'utente non abbia registrato altre carte nella stessa società
        $existCard = Association::query()
            ->join('customers', 'customers.id', '=', 'associations.customer_id')
            ->join('cards', 'cards.id', '=', 'associations.card_id')
            ->where('cards.company_id', '=', auth()->user()->company_id)
            ->where('customers.email', '=', request()->input('email'))
            ->get();

        if(!empty($existCard[0])){
            throw ValidationException::withMessages([
                'email' => 'The email is already used'
            ]);
        }

        // Generiamo un numero da 12 --> univoco
        do{

            $cardNumber = mt_rand(100000000000, 999999999999);
            $existNumber = Association::query()
                ->where('card_number', '=', $cardNumber)
                ->get();

        }while(!empty($existNumber[0]));

        // Creiamo l'associazione
        $attributes = [
            'point' => 0,
            'card_number' => $cardNumber,
            'customer_id' => $existUser[0]->id,
            'card_id' => request()->input('card_id'),
        ];

        Association::create($attributes);

        return redirect('/associations/index')->with('success', 'Card correctly associated');

    }

}
