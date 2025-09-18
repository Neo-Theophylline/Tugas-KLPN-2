<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;

class ContactFrontendController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('page.frontend.Contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('page.frontend.Contact.create');
    }

    public function store(Request $request)
    {
        // ✅ Ditambahkan validasi lebih detail
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'phonenum' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        // ✅ Simpan file ke storage/app/public/contact
        $path = $request->file('photo')->store('contact', 'public');

        // ✅ Simpan data ke database
        Contact::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'subject' => $request->subject,
            'phonenum' => $request->phonenum,
            'message' => $request->message,
        ]);

        // ✅ Redirect ke index dengan flash message
        return redirect()->route('admin.contact')->with('success', 'Contact created successfully.');
    }

    // 🔹 Menampilkan form edit
    public function edit($id)
    {
        // ✅ Diganti findOrFail agar otomatis 404 kalau data tidak ada
        $contacts = Contact::findOrFail($id);

        // ✅ Dikirim variabel $contacts ke view edit
        return view('page.backend.Contact.edit', compact('contacts'));
    }

    // 🔹 Update data contact
    public function update(Request $request, $id)
    {
        $contacts = Contact::findOrFail($id); // ✅ Diganti findOrFail

        // ✅ Validasi dengan photo optional
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'phonenum' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        // ✅ Update field teks
        $contacts->firstname    = $request->firstname;
        $contacts->lastname = $request->lastname;
        $contacts->email = $request->email;
        $contacts->subject    = $request->subject;
        $contacts->phonenum = $request->phonenum;
        $contacts->message = $request->message;

        // ✅ Jika ada file baru, hapus file lama dan simpan baru
        if ($request->hasFile('photo')) {
            if ($contacts->photo && Storage::disk('public')->exists($contacts->photo)) {
                Storage::disk('public')->delete($contacts->photo); // hapus foto lama
            }

            $path = $request->file('photo')->store('contact', 'public');
            $contacts->photo = $path;
        }

        $contacts->save(); // ✅ Simpan perubahan

        return redirect()->route('admin.contact')->with('success', 'Contact updated successfully.');
    }

    // 🔹 Hapus data contact
    public function destroy($id)
    {
        $contacts = Contact::findOrFail($id);

        // Hapus foto jika ada di storage
        if ($contacts->photo && Storage::disk('public')->exists($contacts->photo)) {
            Storage::disk('public')->delete($contacts->photo);
        }

        // Hapus data Hero dari DB
        $contacts->delete();

        return redirect()->route('admin.contact')->with('success', 'Contact deleted successfully.');
    }
}
