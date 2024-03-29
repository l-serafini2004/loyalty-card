<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Card;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Models\User;
class CardController extends Controller
{
    public function show(){

        // Tutte le carte che una società possiede
        $cards = Card::query()
                    ->where('company_id', auth()->user()->company_id);

        // Voglio tutti gli utenti e le carte che possiedono
        $associations = Association::query()
            ->select('associations.point', 'cards.cardName', 'associations.card_number', 'customers.name', 'customers.surname', 'customers.email', 'customers.customer_number')
            ->join('customers', 'associations.customer_id', '=', 'customers.id')
            ->join('cards', 'cards.id', '=', 'associations.card_id')
            ->where('cards.company_id', '=', auth()->user()->company_id);


        return view('cards.show', [
            'cards' => $cards->get(),
            'associations' => $associations->get(),
        ]);
    }

    public function create(){
        return view('cards.create');
    }

    public function store(){
        $attributes = request()->validate([
           'cardName' => 'required|min:1',
           'color' => 'required',
           'bgColor' => 'required',
        ]);

        $attributes['company_id'] = auth()->user()->company_id;

        // Controlla il numero di carte che ci sono
        $numOfCard = Card::query()
            ->select(DB::raw('count(*) as nuser'))
            ->where('company_id', $attributes['company_id'])
            ->get()[0]
            ->nuser;

        $map = [
            'free' => 1,
            'premium' => 3,
            'business' => 5,
        ];


        if($numOfCard === $map[auth()->user()->company->plan]){
            throw ValidationException::withMessages([
                'cardName' => 'Too many card created'
            ]);
        }

        // Controlla se il nome della carta non è gia stato usato
        $quer = Card::query()
            ->select("cardName")
            ->where('company_id', $attributes['company_id']);


        foreach ($quer->get() as $q){
            if($q['cardName'] === $attributes['cardName']){
                throw ValidationException::withMessages([
                    'cardName' => 'Name already used',
                ]);
            }
        }

        Card::create($attributes);

        return redirect('/')->with('success', 'Card created with success');

    }

    public function modify(){

        // Considera tutte le carte che ci servono


        $cards = Card::query()
            ->where('company_id', auth()->user()->company_id);


        return view('cards.update', [
            'cards' => $cards->get()
        ]);
    }

    public function delete(){

        Card::findOrFail( request()->input('idToRemove'))->delete();


        return redirect('/cards/update');

    }

}
