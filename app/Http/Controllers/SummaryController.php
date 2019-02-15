<?php

namespace App\Http\Controllers;

use DB;
use Validator;
use App\User;
use App\Summary;
use App\Company;
use App\SummaryResponse;
use Auth;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function summary(Summary $summary){
      return view('summary', ['summary' => $summary]);
    }

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

      if($r->has('position'))
      $summary->position = $r->position;

      if($r->has('resume'))
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
      return redirect()->action('SummaryController@index');
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

      return redirect()->action('SummaryController@index');
    }
    
    public function getFile(Summary $summary){
        return response()->download(storage_path('app').'/'.$summary->resume_file);
    }
    
    public function statistics(){
        $summaries = Summary::select('summaries.id', 'position')
            ->where('user_id', Auth::id())
            ->join('summary_responses', 'summary_responses.summary_id', 'summaries.id')
            ->groupBy('id', 'position')
            ->where('summary_responses.response', 1)
            ->orderBy(DB::raw('count(response)'), 'desc')
            ->get();
        
        $byDate = [0, 0, 0, 0, 0, 0, 0, 0];
        
         $srs = SummaryResponse::select('summary_responses.created_at')
            ->where('response', 1)
            ->join('summaries', 'summaries.id', 'summary_responses.summary_id')
            ->where('user_id', Auth::id())
            ->get();
        
        foreach($srs as $sr)
            $byDate[date('N', strtotime($sr->created_at))] += 1;

        return view('statistics', ['summaries' => $summaries, 'byDate' => $byDate]);
    }
}
