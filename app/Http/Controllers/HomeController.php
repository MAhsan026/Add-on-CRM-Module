<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('Layout.index');
    }
    public function contactList()
    {
        $user = Auth::user();
        // dd($user);
        $contact = Contact::all();
        return view('Contact.contact_list', compact('contact'));
    }
    public function create()
    {
        $type = ContactType::all();
        return view('Contact.create', compact('type'));
    }
    public function store(Request $request)
    {
        // dd('hlo')

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:contacts,email',
            'phone' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);
        $contact = new Contact;
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->contact_type_id = $request->input('type');
        $contact->status = $request->input('status');
        // dd($contact);
        if ($contact->save()) {
            return redirect()->route('contact.list')->with('success', 'contact created');
        } else {
            return redirect()->back()->with('error', 'contact not created');
        }
    }
    public function edit($id)
    {
        $contact = Contact::findOrfail($id);
        $type = ContactType::all();

        return view('contact.edit', compact('contact', 'type'));
    }
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrfail($id);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->contact_type_id = $request->input('type');
        $contact->status = $request->input('status');
        if ($contact->save()) {
            return redirect()->back()->with('success', 'contact updated');
        } else {
            return redirect()->back()->with('error', 'contact not updated');
        }
    }
    public function delete($id)
    {
        $contact = Contact::findOrfail($id);
        if ($contact->delete()) {
            return redirect()->back()->with('success', 'contact deleted');
        } else {
            return redirect()->back()->with('error', 'contact not deleted');
        }
    }
}
