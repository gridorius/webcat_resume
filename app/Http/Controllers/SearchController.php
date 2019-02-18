<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Auth;
use App\User;
use App\Summary;
use App\SummaryResponse;
use App\Company;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function find(Request $r){
      $companies = Company::where('name', 'like', '%'.$r->text.'%')->get();
        
        if($r->text != '')
        {
            $summaries = User::select('summaries.id', 'summaries.resume_file', 'summaries.position')
            ->distinct()
            ->join('companies', 'companies.user_id', 'users.id')
            ->join('summary_responses', 'summary_responses.company_id', 'companies.id')
            ->join('summaries', 'summaries.id', 'summary_responses.summary_id')
            ->where('users.id', Auth::id())
            ->get();

            $summaries_filtered = [];

            foreach($summaries as $summary){
                $text = Storage::get($summary->resume_file);
                $encode = mb_detect_encoding($text, 'windows-1251');
                $encode = $encode ? $encode : 'windows-1251';
                $encoded =  mb_convert_encoding($text, 'UTF8', $encode);
                if(preg_match('/'.mb_strtolower($r->text).'/i', mb_strtolower($encoded)))
                    $summaries_filtered[] = $summary;
            }
        }else{
            $companies = collect();
            $summaries_filtered = collect();
        }
        
        
        
      return view('found', ['companies' => $companies, 'summaries' => collect($summaries_filtered)]);
    }
}
