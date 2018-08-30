<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendingGroup extends Model
{
    public function contacts()
    {
    	return $this->hasMany('App\Contact', 'sending_group_id');
    }
}
