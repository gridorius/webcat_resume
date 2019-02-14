<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SummaryResponse extends Model
{
    public function company(){
      return $this->belongsTo('App\Company');
    }

    public function resume(){
      return $this->hasOne('App\Resume');
    }
}
