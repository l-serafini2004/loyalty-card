<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function create(){
        return view('companies.create');
    }

    public function store(Request $request){
        $attributes = request()->validate([
            'company_name' => 'required',
            'email' => 'required|email',
            'company_number' => 'regex:/^[0-9]+$/',
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

        // Genero un token casuale di 30 caratteri
        $token = Str::random(30);


        // Inserisco all'utente l'input
        DB::table('users')
            ->where('id', auth()->user()->id)
            ->update([
                'company_id' => $request->input('id'),
                'api_token' => $token,
            ]);

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
            'premium' => 5,
            'business' => 15,
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

        // Genero un token casuale di 30 caratteri
        $token = Str::random(30);


        // Aggiungo il codice all'utente
        DB::table('users')
            ->where('id', auth()->user()->id)
            ->update([
                'company_id' => $request->input('id'),
                'api_token' => $token,
            ]);

        return redirect('/')->with('success', 'Join correctly on a company');

    }

    public function left(){
        $numberOfUser = User::query()
                        ->where('company_id', '=', auth()->user()->company_id)
                        ->count();


        return view('companies.left', [
            'n' => (int)$numberOfUser,
        ]);

    }

    public function destroy(){

        // Check di sicurezza
        $numberOfUser = User::query()
            ->where('company_id', '=', auth()->user()->company_id)
            ->count();
        if($numberOfUser === 1) return redirect('/company/left');

        $user = User::findOrFail(auth()->user()->id);

        $user->update([
            'api_token' => null,
            'company_id' => null
        ]);

        $user->save();

        return redirect('/')->with('success', 'Correctly log out from company');

    }

}
