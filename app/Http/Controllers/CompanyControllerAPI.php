<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyControllerAPI extends Controller
{
    // Funzione
    public function index(){

        // Get our company data
        $company = Company::query()
            ->where('id', '=', auth()->user()->company_id)
            ->first();

        return response()->json([
            'company' => [
                'id' => $company->id,
                'company_name' => $company->company_name,
                'company_number' => $company->company_number,
                'company_email' => $company->email,
                'state' => $company->state,
                'city' => $company->city,
                'address' => $company->address,
                'plan' => $company->plan,
                'created_at' => $company->created_at,
                'updated_at' => $company->updated_at
            ]
        ]);
    }
}
