<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function create(){
        return view('companies.create');
    }

    public function store(Request $request){
        $attributes = request()->validate([
            'company_name' => 'required',
            'email' => 'required|email',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'id' => ['required', 'regex:/^\d{5}$/'],
            'rootPassword' => 'required|min:8',
            'plan' => 'required',
        ]);
        if($request->input('repeat') !== $request->input("rootPassword")){
            throw ValidationException::withMessages([
                'repeat' => 'The password are different',
            ]);
        }


        // Creo la company
        Company::create($attributes);

        // Inserisco all'utente l'input
        DB::table('users')
            ->where('id', auth()->user()->id)
            ->update(['company_id' => $request->input('id')]);

        return redirect('/')->with('success', 'Company account created');
    }

    public function admin(){
        return view('onlyconn');
    }

    public function sign(){
        return view('companies.sign');
    }

    public function join(Request $request){
        $attribute = request()->validate([
            'id' => ['required', 'regex:/^\d{5}$/'],
            'rootPassword' => 'required',
        ]);

        $shop = Company::query()
            ->select('rootPassword', 'plan')
            ->where('id', $attribute['id'])->get();


        if(!password_verify($request->input('rootPassword'), $shop[0]->rootPassword) ) {
            // caso in cui la password sia scorretta
            throw ValidationException::withMessages([
                'rootPassword' => 'The password is incorrect',
            ]);
        }

        // Controlla il caso in cui ci siano troppi utenti
        $map = [
            'free' => 1,
            'premium' => 3,
            'business' => 5,
        ];

        $n = User::query()
            ->select(DB::raw('count(distinct id) as nuser'))
            ->where('company_id', $request->input('id'))
            ->get();

        $numberOfAdmin =  $n[0]->nuser;

        if($numberOfAdmin === $map[$shop[0]->plan]){
            throw ValidationException::withMessages([
                'others' => 'There are too many admin',
            ]);
        }

        // Aggiungo il codice all'utente
        DB::table('users')
            ->where('id', auth()->user()->id)
            ->update(['company_id' => $request->input('id')]);

        return redirect('/')->with('success', 'Join correctly on a company');

    }

}
