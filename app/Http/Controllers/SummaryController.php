<?php

namespace App\Http\Controllers;

use Validator;
use App\User;
use App\Summary;
use Auth;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index(){
      return view('summaries', ['summaries' => Auth::user()->summaries]);
    }

    public function new(){
      return view('newsummary');
    }

    public function create(Request $r){
      $this->validate($r, [
        'position' => 'required',
        'resume' => 'required'
      ]);

      $summary = new Summary();
      $summary->user_id = Auth::id();
      $summary->position = $r->position;
      $summary->resume_file = $r->resume->store('resume_files');
      $summary->save();

      return redirect()->route('summaries');
    }

    public function delete($id){
      $summary = Summary::find($id);
      if(Auth::user()->id == $summary->user_id)
        $summary->delete();
      return back();
    }
}
