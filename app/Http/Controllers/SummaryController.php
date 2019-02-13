<?php

namespace App\Http\Controllers;

use App\User;
use App\Summary;
use Auth;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index(){
      return view('summaries', ['summaries' => Auth::user()->summaries]);
    }
}
