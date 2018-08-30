<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\GeneralController;

use App\User;
use App\ActivityLog;
use App\Contact;
use App\SendingGroup;
use App\MessageLog;

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
        $contacts = Contact::get(['id']);

    	return view('admin.dashboard', ['setting' => $this->setting,
                        'contacts' => $contacts
        ]);
    }


    // method use to manage sending groups
    public function sendingGroup()
    {
        $sg = SendingGroup::orderBy('name', 'asc')->get();

        return view('admin.sending-groups', ['setting' => $this->setting, 'sg' => $sg]);
    }


    // method use to add sending group
    public function addSendingGroup()
    {
        return view('admin.sending-group-add', ['setting' => $this->setting]);
    }


    // method use to save new sending group
    public function postAddSendingGroup(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sending_groups'
        ]);

        $name = $request['name'];

        $sg = new SendingGroup();
        $sg->name = $name;
        $sg->save();

        ActivityLogController::activity_log('Admin Added Sending Group');

        return redirect()->route('admin.sending.groups')->with('success', 'Sending Group Added!');
    }


    // method use to update sending group
    public function updateSendingGroup($id = null)
    {
        $sg = SendingGroup::findorfail($id);

        return view('admin.sending-group-update', ['setting' => $this->setting, 'sg' => $sg]);
    }


    // method use to save update in sending group
    public function postUpdateSendingGroup(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $sg_id = $request['sg_id'];
        $name = $request['name'];

        $sg = SendingGroup::findorfail($sg_id);

        $name_check = SendingGroup::whereName($name)->first();

        if(count($name_check) > 0 && $name_check->id != $sg->id) {
            return redirect()->back()->with('error', 'Sending Group Name Exists!');
        }

        $sg->name = $name;
        $sg->save();

        ActivityLogController::activity_log('Admin Updated Sending Group');

        return redirect()->route('admin.sending.groups')->with('success', 'Sending Group Updated!');
    }


    // method to view contacts management
    public function contacts()
    {
        $contacts = Contact::orderBy('name', 'asc')
                        ->paginate(5);

        return view('admin.contacts', ['setting' => $this->setting, 'contacts' => $contacts]);
    }


    // method to add contact
    public function addContact()
    {
        $sg = SendingGroup::orderBy('name', 'asc')->get(['id', 'name']);

        return view('admin.contact-add', ['sg' => $sg, 'setting' => $this->setting]);
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

        // check the number if what network it belongs
        $network = GeneralController::network_check($mobile_number);

        $contact = new Contact();
        $contact->name = $name;
        $contact->mobile_number = $mobile_number;
        if($sending_group_id != null) {
            $contact->sending_group_id = $sending_group->id;
        }
        $contact->network = $network;
        $contact->save();

        // add activity log
        ActivityLogController::activity_log('Admin Added Contact');

        return redirect()->back()->with('success', 'New Contact Added: ' . $mobile_number);
    }


    // method use to delete contact
    public function deleteContact($id = null)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        // add activity log
        ActivityLogController::activity_log('Admin Deleted Contact');

        return redirect()->back()->with('success','Contact Deleted!');
    }


    // method use to update contact
    public function updateContact($id = null)
    {
        $contact = Contact::findOrFail($id);
        $sg = SendingGroup::orderBy('name', 'asc')->get(['id', 'name']);

        return view('admin.contact-update', ['sg' => $sg, 'setting' => $this->setting, 'contact' => $contact]);
    }


    // method use to save update on contact
    public function postUpdateContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile_number' => 'required'
        ]);

        $contact_id = $request['contact_id'];
        $name = $request['name'];
        $mobile_number = $request['mobile_number'];
        $sending_group_id = $request['sending_group'];

        $contact = Contact::findOrFail($contact_id);

        $check_mobile = Contact::whereMobileNumber($mobile_number)->first();

        if(count($check_mobile) > 0 && $check_mobile->id != $contact->id) {
            return redirect()->back()->with('error', 'Duplicate Mobile Number. Please double check your mobile number.');
        }

        $contact->name = $name;
        $contact->mobile_number = $mobile_number;
        $contact->sending_group_id = $sending_group_id;
        $contact->save();

        ActivityLogController::activity_log('Admin Updated Contact');

        return redirect()->back()->with('success', 'Contact Successfully Updated!');
    }


    // method to view messages
    public function messages()
    {
        $messages = MessageLog::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.messages', ['setting' => $this->setting, 'messages' => $messages]);
    }


    // method use to send group message
    public function sendGroupMessage()
    {
        $groups = SendingGroup::orderBy('name', 'asc')->get(['id', 'name']);

        return view('admin.message-send-group', ['setting' => $this->setting, 'groups' => $groups]);
    }


    // method to pose send group message
    public function postSendGroupMessage(Request $request)
    {
        $request->validate([
            'recipient' => 'required',
            'message' => 'required',
            'message_type' => 'required'
        ]);

        $group_id = $request['recipient'];
        $message = $request['message'];
        $message_type = $request['message_type'];

        $group = SendingGroup::findOrFail($group_id);

        $contacts = $group->contacts;

        // if contact is < 1 
        if(count($contacts) < 1) {
            redirect()->back()->with('info', 'No Recipeint Found!');
        }

        // count contacts * message chars/160 if less than the sms credit to be able to send message


        // iterate sending message
        $count = 0;
        $numbers = array();
        foreach($contacts as $c) {
            array_push($numbers, $c->mobile_number);
            $count++;
        }

        SmsController::sendMsg($numbers, $message);

        // add message log
        $message_log = new MessageLog();
        $message_log->message = $message;
        $message_log->recipient = strtoupper($group->name);
        $message_log->type_of_message = $message_type;
        $message_log->count = $count;
        $message_log->save();


        // add activity log
        ActivityLogController::activity_log('Admin Send Group Message in ' . strtoupper($group->name));

        // return to messages home
        return redirect()->route('admin.messages')->with('success', 'Message Sent to Group: ' . strtoupper($group->name));
    }


    // method use to send single message
    public function postSendSingleMessage(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $contact_id = $request['contact_id'];
        $message = $request['message'];

        $contact = Contact::findOrFail($contact_id);

        // send message
        SmsController::sendMsg($contact->mobile_number, $message);

        // message log
        $message_log = new MessageLog();
        $message_log->message = $message;
        $message_log->recipient = ucwords($contact->name) . ' - ' . $contact->mobile_number;
        $message_log->type_of_message = 'General Message (Specific)';
        $message_log->count = 1;
        $message_log->save();


        // activity log
        ActivityLogController::activity_log('Admin Sent Message to ' . ucwords($contact->name));

        // return back
        return redirect()->back()->with('success', 'Message sent to ' . ucwords($contact->name));
    }


    // method use to view settings
    public function settings()
    {
        return view('admin.settings', ['setting' => $this->setting]);
    }


    // method use to save update on settings
    public function postSettings(Request $request)
    {
        $request->validate([
            'application_name' => 'required',
            'barangay_name' => 'required'
        ]);

        $app = $request['application_name'];
        $brgy = $request['barangay_name'];

        DB::table('settings')
                    ->update([
                        'app_name' => $app,
                        'barangay_name' => $brgy
                    ]);

        ActivityLogController::activity_log('Admin Updated Settings!');

        return redirect()->route('admin.settings')->with('success', 'Settings Updated!');
    }


    // method to view activity logs
    public function activityLogs()
    {
    	$logs = ActivityLog::orderBy('created_at', 'desc')
    				->paginate(10);

    	return view('admin.activity-logs', ['logs' => $logs, 'setting' => $this->setting]);
    }

}
