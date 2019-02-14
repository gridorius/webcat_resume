<?php

namespace App\Http\Controllers;

use App\Summary;
use App\Company;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function find(Request $r){
      $companies = Company::where('name', 'like', '%'.$r->text.'%')->get();

      return view('found', ['companies' => $companies]);
    }
}
