<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssociationResource;
use App\Models\Association;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class AssociationControllerAPI extends Controller
{

    use HttpResponses;

    public function all(){

        // Tutti i dati che ci interessano
        $associations = Association::query()
            ->select('associations.point', 'cards.cardName', 'associations.card_number', 'customers.name', 'customers.surname', 'customers.email', 'customers.customer_number')
            ->join('customers', 'associations.customer_id', '=', 'customers.id')
            ->join('cards', 'cards.id', '=', 'associations.card_id')
            ->where('cards.company_id', '=', auth()->user()->company_id)
            ->get();

            return AssociationResource::collection($associations);
    }

    public function update(){

        // Consideriamo di avere sia la mail dell'utente che il puntrggio
        $assoc = Association::query()
            ->select('associations.point', 'associations.id')
            ->join('customers', 'customers.id', '=', 'associations.customer_id')
            ->join('cards', 'cards.id', '=', 'associations.card_id')
            ->where('customers.email', '=', request('email'))
            ->where('cards.company_id', '=', auth()->user()->company_id)
            ->first();


        if(empty($assoc["id"])) {
            return $this->error("", "The user doesn't exists or he has no associations", 404);
        }

        $valore_attuale = (int)$assoc['point'];
        $valore = (int)request('changePoint');

        if(($valore_attuale += $valore) < 0) $valore_attuale = 0;


        $newAssoc = Association::findOrFail($assoc['id']);

        $newAssoc->update(['point' => $valore_attuale]);
        $assoc->save();

        return $this->success([
            'message' => 'Association correctly updated',
        ]);

    }
}
