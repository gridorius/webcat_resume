<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SummaryResponse extends Model
{
    public function company(){
      return $this->hasOne('App\Company');
    }

    public function resume(){
      return $this->hasOne('App\Resume');
    }
}
