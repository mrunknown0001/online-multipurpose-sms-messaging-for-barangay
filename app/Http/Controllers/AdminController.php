<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\SmsController;

use App\User;
use App\ActivityLog;
use App\Contact;
use App\SendingGroup;

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


    // method to view contacts management
    public function contacts()
    {
        $contacts = Contact::orderBy('name', 'asc')
                        ->paginate(10);

        return view('admin.contacts', ['setting' => $this->setting, 'contacts' => $contacts]);
    }


    // method to add contact
    public function addContact()
    {
        return view('admin.contact-add', ['setting' => $this->setting]);
    }


    // method use to save added contact
    public function postAddContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile_number' => 'required|unique:contacts'
        ]);

        $name = $request['name'];
        $mobile_number = $request['mobile_number'];
        $sending_group_id = $request['sending_group'];

        

        if($sending_group_id != null)
            $sending_group = SendingGroup::findOrFail($sending_group_id);

        $contact = new Contact();
        $contact->name = $name;
        $contact->mobile_number = $mobile_number;
        if($sending_group_id != null) {
            $contact->sending_group_id = $sending_group->id;
        }
        $contact->network = null;
        $contact->save();

        return redirect()->back()->with('success', 'New Contact Added: ' . $mobile_number);
    }


    // method to view messages
    public function messages()
    {
        return view('admin.messages', ['setting' => $this->setting]);
    }


    // method to view activity logs
    public function activityLogs()
    {
    	$logs = ActivityLog::orderBy('created_at', 'desc')
    				->paginate(10);

    	return view('admin.activity-logs', ['logs' => $logs, 'setting' => $this->setting]);
    }


    // template call method for sending sms
    public function send()
    {
    	$numbers = array('09156119134', '09101990832');

    	foreach($numbers as $n) {
    		// SmsController::sendsms($n, 'Sample Loop Message');
    	}
    	
    }
}
