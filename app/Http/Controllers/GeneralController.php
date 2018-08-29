<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Http\Controllers\ActivityLogController;

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
        if(Auth::check()) {
            return $this->auth_check();
        }

    	return view('welcome', ['setting' => $this->setting]);
    }


    // login method, shows the login page
    public function login()
    {
        if(Auth::check()) {
            return $this->auth_check();
        }
        
        return view('login', ['setting' => $this->setting]);
    }


    // method use to check auth user
    public static function auth_check()
    {
        if(Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        else {
            return redirect()->route('welcome');
        }
    }


    // method use to determine network
    public static function network_check($number = null)
    {

        $globe = array('0905', '0906', '0915', '0916', '0917', '0926', '0927', '0935', '0936', '0945', '0955', '0956', '0966', '0975', '0976', '0994', '0995', '0997', '0996', '0937', '0817');

        $globe2 = array('+63905', '+63906', '+63915', '+63916', '+63917', '+63926', '+63927', '+63935', '+63936', '+63945', '+63955', '+63956', '+63966', '+63975', '+63976', '+63994', '+63995', '+63997', '+63996', '+63937', '+63817');

        $tm = array('0967', '0977', '0978', '0979');

        $tm2 = array('+63967', '+63977', '+63978', '+63979');

        $smart = array('0913', '0914', '0911', '0940', '0951', '0970', '0980', '0981', '0989', '0992', '0928', '0929', '0998', '0999', '0918', '0919', '0920', '0921', '0813');

        $smart2 = array('+63913', '+63914', '+63911', '+63940', '+63951', '+63970', '+63980', '+63981', '+63989', '+63992', '+63928', '+63929', '+63998', '+63999', '+63918', '+63919', '+63920', '+63921', '+63813');

        $tnt = array('0907', '0908', '0909', '0910', '0912', '0930', '0938', '0939', '0946', '0947', '0948', '0949' , '0950');

        $tnt2 = array('+63907', '+63908', '+639+639', '+63910', '+63912', '+63930', '+63938', '+63939', '+63946', '+63947', '+63948', '+63949' , '+63950');

        $sun = array('0922', '0923', '0924', '0925', '0931', '0932', '0933', '0934', '0941', '0942', '0943', '0944');

        $sun2 = array('+63922', '+63923', '+63924', '+63925', '+63931', '+63932', '+63933', '+63934', '+63941', '+63942', '+63943', '+63944');


        if(in_array(substr($number, 0, 4), $globe)) {
            return 'Globe';
        }
        else if(in_array(substr($number, 0, 6), $globe2)) {
            return 'Globe';
        }
        else if(in_array(substr($number, 0, 4), $tm)) {
            return 'TM';
        }
        else if(in_array(substr($number, 0, 6), $tm2)) {
            return 'TM';
        }
        else if(in_array(substr($number, 0, 4), $smart)) {
            return 'Smart';
        }
        else if(in_array(substr($number, 0, 6), $smart2)) {
            return 'Smart';
        }
        else if(in_array(substr($number, 0, 4), $tnt)) {
            return 'TNT';
        }
        else if(in_array(substr($number, 0, 6), $tnt2)) {
            return 'TNT';
        }
        else if(in_array(substr($number, 0, 4), $sun)) {
            return 'Sun Cellular';
        }
        else if(in_array(substr($number, 0, 6), $sun2)) {
            return 'Sun Cellular';
        }
        else {
            return 'Unknown Network';
        }


    }


    // method use to logout
    public function logout()
    {
        ActivityLogController::activity_log('Logout');

        Auth::logout();

        return redirect()->route('welcome');
    }
}
