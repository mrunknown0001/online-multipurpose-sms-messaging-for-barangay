<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use App\Http\Controllers\ActivityLog;
use App\Http\Controllers\SmsController;

use App\User;
use App\ActivityLog as Log;

class AdminController extends Controller
{
	protected $setting;


    public function __construct()
    {
    	$this->setting = DB::table('settings')->first();
    }


    // method to view admin dashboard
    public function dashboard()
    {
    	return view('admin.dashboard', ['setting' => $this->setting]);
    }


    // method to view activity logs
    public function activityLogs()
    {
    	$logs = Log::orderBy('created_at', 'desc')
    				->paginate(15);

    	return view('admin.activity-logs', ['logs' => $logs, 'setting' => $this->setting]);
    }


    public function send()
    {
    	$numbers = array('09156119134', '09101990832');

    	foreach($numbers as $n) {
    		// SmsController::sendsms($n, 'Sample Loop Message');
    	}

    	
    }
}
