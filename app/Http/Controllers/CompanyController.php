<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
      return view('companies', ['companies' => Company::all()]);
    }

    public function get(Company $company){
      return view('company', ['company' => $company]);
    }
}
