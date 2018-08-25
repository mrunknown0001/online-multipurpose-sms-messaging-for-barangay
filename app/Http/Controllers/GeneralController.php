<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;

class GeneralController extends Controller
{
	protected $setting;


    public function __construct()
    {
    	$this->setting = DB::table('settings')->first();
    }


    // welcome method, shows the welcome landing page
    public function welcome()
    {
    	return view('welcome', ['setting' => $this->setting]);
    }


    // login method, shows the login page
    public function login()
    {
        return view('login');
    }
}
