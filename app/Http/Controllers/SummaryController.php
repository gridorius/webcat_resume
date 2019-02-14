<?php

namespace App\Http\Controllers;

use Validator;
use App\User;
use App\Summary;
use App\Company;
use App\SummaryResponse;
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

    public function update(Request $r){
      $this->validate($r, [
        'id' => 'required'
      ]);

      $summary = Summary::find($r->id);

      if(!empty($r->position))
      $summary->position = $r->position;

      if(!empty($r->resume))
        $summary->resume_file = $r->resume->store('resume_files');

      $summary->save();

      return redirect()->route('summaries');
    }

    public function edit($id){
      if(Auth::id() != Summary::find($id)->user_id)
        return back();
      return view('editsummary', ['summary' => Summary::find($id)]);
    }

    public function delete($id){
      $summary = Summary::find($id);
      if(Auth::user()->id == $summary->user_id)
        $summary->delete();
      return back();
    }

    public function sendGetForm(Company $company){
      return view('summariessend', ['summaries' => Auth::user()->summaries, 'company' => $company]);
    }

    public function send(Summary $summary, $company_id){
      if($summary->user_id != Auth::id())
        return back();
      

      $summaryResponse = new SummaryResponse();
      $summaryResponse->company_id = $company_id;
      $summaryResponse->summary_id = $summary->id;
      $summaryResponse->save();

      return back();
    }
}
