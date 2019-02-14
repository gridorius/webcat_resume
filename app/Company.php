<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = ['id', 'user_id'];
    
    public function summaryResponses(){
        return $this->hasMany('App\SummaryResponse');
    }
}
