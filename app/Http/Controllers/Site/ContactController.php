<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;

use App\Models\site\Page;
use App\Models\site\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'contact-name' => 'required|string|max:255',
            'contact-email' => 'required|email|max:255',
            'contact-phone' => 'nullable|string|max:20',
            'contact-message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->input('contact-name'),
            'email' => $request->input('contact-email'),
            'phone' => $request->input('contact-phone'),
            'message' => $request->input('contact-message'),
        ]);

        return [
            'success',
            'Your message has been sent successfully.'
        ];
    }


    public function contact()
    {
        return view('site.pages.contact');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }




}
