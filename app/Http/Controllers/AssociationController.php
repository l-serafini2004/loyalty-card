<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Card;
use Illuminate\Http\Request;

class AssociationController extends Controller
{
    public function index(){

        // Tutte le carte che una società possiede
        $cards = Card::query()
            ->where('company_id', auth()->user()->company_id);

        // Voglio tutti gli utenti e le carte che possiedono
        $associations = Association::query()
            ->select('associations.point', 'cards.cardName', 'associations.card_number', 'customers.name', 'customers.surname', 'customers.email', 'customers.customer_number')
            ->join('customers', 'associations.customer_id', '=', 'customers.id')
            ->join('cards', 'cards.id', '=', 'associations.card_id')
            ->where('cards.company_id', '=', auth()->user()->company_id);


        return view('cards.index', [
            'cards' => $cards->get(),
            'associations' => $associations->get(),
        ]);
    }

    public function show(Association $association){

        // Prendo i dati che mi interessano
        $assoc= Association::query()
            ->select('associations.id', 'customers.name', 'customers.surname', 'customers.email', 'customers.customer_number', 'associations.card_number', 'associations.point')
            ->join('customers', 'customers.id', '=', 'associations.customer_id')
            ->where('associations.id','=' ,$association['id']);

        return view('associations.show', [
            'assoc' => $assoc->get()[0],
        ]);
    }

    public function update(){

        // Scelgo la carta che ha quel numero
        $asso = Association::findOrFail(request()->input('id'));

        // Update i valori corretti
        $asso->point = request()->input('points');

        // Salva e ritorna
        $asso->save();
        return redirect('/associations/index');

    }

    public function destroy(){
        $asso = Association::findOrFail(request()->input('id'));

        $asso->delete();
        return redirect('/associations/index')->with('success', 'Association correctly deleted');
    }
}
