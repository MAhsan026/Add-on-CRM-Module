<?php

namespace App\Http\Controllers;

use App\Mail\OnCreateReminder;
use App\Mail\ReminderAdminEmail;
use App\Models\Contact;
use App\Models\ContactType;
use App\Models\Followup;
use App\Models\ReminderAdmin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class FollowupController extends Controller
{
    //

    public function create()
    {
        $contact = Contact::all();
        // $contact = Contact::all();

        $adminuser = User::whereHas('role', function ($query) {
            $query->where('name', 'Admin');
        })->get();
        $user = Auth::user();

        // dd($user->id);
        $type = ContactType::all();
        return view('Followup.create', compact('contact', 'type', 'user', 'adminuser'));
    }
    public function store(Request $request)
    {

        // dd($user);

        // $request->validate([
        //     'contact' => 'required',
        //     'date_time' => 'required',
        //     'type' => 'required',
        //     'status' => 'required',
        //     'notification_type' => 'required',
        // ]);
        $followup = new Followup();
        $followup->admin_id = $request->admin;
        $followup->user_id = Auth::user()->id;
        $followup->contact_id = $request->contact;
        $followup->date_time = $request->date_time;
        $followup->email = $request->email;
        $followup->type = $request->type;
        $followup->status = $request->status;
        $followup->notification_type = $request->notification_type;
        if ($followup->save()) {
            return redirect()->route('followup.list')->with('success', 'Follow up added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add follow up');
        }
    }
    public function list()
    {
        $user = Auth::user();

        $followups = Followup::with('user')->where('user_id', $user->id)->get();
        // dd($followup);
        return view('Followup.list', compact('followups'));
    }
    public function edit($id)
    {
        $followup = Followup::find($id);
        $adminuser = User::whereHas('role', function ($query) {
            $query->where('name', 'Admin');
        })->get();
        $contact = Contact::all();
        // dd($contact);
        return view('Followup.edit', compact('followup', 'contact', 'adminuser'));
    }
    public function update(Request $request, $id)
    {
        $user = User::get();
        // dd($user);
        $followup = Followup::find($id);

        $request->validate([
            'admin' => 'required',
            'date_time' => 'required',
            'type' => 'required',
            'status' => 'required',
            'notification_type' => 'required',
        ]);

        $followup->admin_id = $request->admin;
        $followup->user_id = Auth::user()->id;
        $followup->contact_id = $request->contact;
        $followup->date_time = $request->date_time;
        $followup->type = $request->type;
        $followup->status = $request->status;
        $followup->notification_type = $request->notification_type;
        if ($followup->save()) {
            return redirect()->route('followup.list')->with('success', 'Follow up updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update follow up');
        }
    }
    public function delete($id)
    {
        $followup = Followup::find($id);
        if ($followup->delete()) {
            return redirect()->route('followup.list')->with('success', 'Follow up deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete follow up');
        }
    }
    public function reminder_admin()
    {
        $users = User::with('role')->where('role_id', 1)->get();
        return view('Followup.reminder_admin', compact('users'));
    }
    public function reminder_admin_email(Request $request)
    {
        $reminder_type = $request->input('reminderType');
        // dd($reminder_type);
        $users = $request->input('admin');
        $followup = Followup::where('admin_id', $users)->get();
        // dd($user, $followup);
        $user = User::find($users);
        if ($reminder_type == 'on_create') {
            Mail::to($user->email)->send(new OnCreateReminder($user, $followup, [], []));
            return redirect()->back()->with('success', 'Email sent successfully');
        }
        if ($reminder_type == 'follow_up_due_date') {
            $followup_date = Followup::where('admin_id', $users)
                ->value('date_time');
            $reminder_date = Carbon::parse($followup_date);
            $followup_date = $reminder_date->subMinutes(20);
            $reminder_admin = new ReminderAdmin();
            $reminder_admin->admin_id = $users;
            $reminder_admin->reminder_type = $reminder_type;
            $reminder_admin->reminder_date = $followup_date;
            // dd($reminder_admin);
            $reminder_admin->save();
            return redirect()->back()->with('success', 'Email will be sent');
        }
        if ($reminder_type == 'before_follow_up_due_date') {
            $reminder = new ReminderAdmin();
            $reminder->admin_id = $users;
            $reminder->reminder_type = $reminder_type;
            $reminder->reminder_date = $request->input('reminder_date');
            // dd($reminder);
            $reminder->save();
            return redirect()->back()->with('success', 'Email will be sent');
        }
    }
}
