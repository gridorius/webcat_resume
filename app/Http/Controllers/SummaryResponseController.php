<?php

namespace App\Http\Controllers;

use Auth;
use App\SummaryResponse;
use Illuminate\Http\Request;

class SummaryResponseController extends Controller
{
    public function setResponse(SummaryResponse $sr, $response){
        if(Auth::id() != $sr->company->user_id)
            return back();
        
        $sr->response = $response;
        $sr->save();
        return back();
    }
}
