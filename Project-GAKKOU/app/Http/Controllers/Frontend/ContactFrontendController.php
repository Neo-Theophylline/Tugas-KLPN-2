<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Media;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactFrontendController extends Controller
{
    public function indexFrontend()
    {
        $medias = Media::where('is_active', 'active')->get();

        return view('page.frontend.Contact.index', compact( 'medias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'email'     => 'required|string|max:255',
            'subject'   => 'required|string|max:255',
            'phonenum'  => 'required|string|max:255',
            'message'   => 'required|string|max:255',
        ]);

        Contact::create($request->only('firstname', 'lastname', 'email', 'subject', 'phonenum', 'message'));

        return redirect()->route('contact.frontend')->with('success', 'Contact created successfully.');
    }

    public function indexAdmin()
    {
        $contacts = Contact::all();
        return view('page.backend.Contact.index', compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contact')->with('success', 'Contact deleted successfully.');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('page.backend.Contact.show', compact('contact'));
    }
}
