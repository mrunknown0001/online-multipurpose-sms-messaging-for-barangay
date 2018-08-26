<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\ActivityLog;

class ActivityLogController extends Controller
{
    ////////////////////////////////
    // activity log for all users //
    ////////////////////////////////
    public static function activity_log($action = null)
    {
        if(Auth::check()) {
        	$log = new ActivityLog();
            $log->user_id = Auth::user()->id;
            $log->action = $action;
            $log->save();
        }
    }
}
