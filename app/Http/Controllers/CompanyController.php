<?php

namespace App\Http\Controllers;

use Auth;
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
    
    public function myList(){
        return view('mycompanies', ['companies' => Auth::user()->companies]);
    }
    
    public function editGetForm(Company $company){
        return view('editcompany', ['company' => $company]);
    }
    
    public function update(Request $r){
        $company = Company::find($r->id);
        if($company->user_id != Auth::id())
            return back();
        
        if($r->has('name'))
            $company->name = $r->name;
        if($r->has('site'))
            $company->site = $r->site;
        if($r->has('addres'))
            $company->addres = $r->addres;
        if($r->has('description'))
            $company->description = $r->description;

        $company->save();
        
        return redirect()->action('CompanyController@get', ['company' => $company]);
    }
    
    public function newGetForm(){
        return view('newcompany');
    }
    
    public function new(Request $r){
        $this->validate($r, [
            'name' => 'required',
            'site' => 'required',
            'addres' => 'required',
            'phone' => 'required'
        ]);
        
        $company = new Company($r->all());
        $company->user_id = Auth::id();
        $company->save();
        
        return redirect()->action('CompanyController@get', ['company' => $company]);
    }
}
