<?php

namespace App\Http\Controllers;

use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;

class CardControllerAPI extends Controller
{
    public function index(){
        $cards = Card::query()
            ->where('company_id', '=', auth()->user()->company_id)
            ->get();

        return CardResource::collection($cards);
    }

    public function show(){
        $name = request('cardName');

        $cards = Card::query()
            ->where('company_id', '=', auth()->user()->company_id)
            ->where('cardName', 'like', '%' . $name . '%')
            ->get();

        return CardResource::collection($cards);

    }


}
