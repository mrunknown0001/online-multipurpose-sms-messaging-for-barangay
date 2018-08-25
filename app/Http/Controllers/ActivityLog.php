<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\ActivityLog as Log;

class ActivityLog extends Controller
{
    ////////////////////////////////
    // activity log for all users //
    ////////////////////////////////
    public static function activity_log($action = null)
    {
    	$log = new Log();
        $log->user_id = Auth::user()->id;
        $log->action = $action;
        $log->save();
    }
}
