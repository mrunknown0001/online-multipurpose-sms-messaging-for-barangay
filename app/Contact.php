<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	public function sg()
	{
		return $this->belongsTo('App\SendingGroup', 'sending_group_id');
	}
}
