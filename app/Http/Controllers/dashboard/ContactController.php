<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\site\Contact;
use App\Models\site\Page;

class ContactController extends Controller
{


    public function index()
    {
        $contacts = Contact::all();
        $page = Page::where('status' , 'site')->limit(6)->latest()->get();

        return view('dashboard.contacts.index', compact('contacts' , 'page'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }




}
