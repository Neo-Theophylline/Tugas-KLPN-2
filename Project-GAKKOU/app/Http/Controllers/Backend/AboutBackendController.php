<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutBackendController extends Controller
{
        public function index()
        {
            $abouts = About::all();
            return view('page.backend.About.index', compact('abouts'));
        }
    
        public function create()
        {
            return view('page.backend.About.create');
        }

        public function store(Request $request)
        {
             // ✅ Ditambahkan validasi lebih detail
        $request->validate([
            'description' => 'required|string|max:255',
            'photo' => 'image',
        ]);

        // ✅ Simpan file ke storage/app/public/hero
        $path = $request->file('photo')->store('about', 'public');

        // ✅ Simpan data ke database
        About::create([
            'description' => $request->description,
            'photo'    => $path, // simpan path file ke DB
        ]);

        // ✅ Redirect ke index dengan flash message
        return redirect()->route('admin.about')->with('success', 'About created successfully.');
        }

        public function edit($id)
        {
              $abouts = About::findOrFail($id);

            if ($abouts == null) {
            return redirect()->route('admin.about')->with('error', 'About not found.');
        }

            return view('page.backend.About.edit', compact('abouts'));
        }

        public function update(Request $request, $id)
    {
        $abouts = About::findOrFail($id); // ✅ Diganti findOrFail

        // ✅ Validasi dengan photo optional
        $request->validate([
            'description' => 'required|string|max:255',
            'photo' => 'image',
        ]);

        // ✅ Update field teks
        $abouts->description = $request->description;

        // ✅ Jika ada file baru, hapus file lama dan simpan baru
        if ($request->hasFile('photo')) {
            if ($abouts->photo && Storage::disk('public')->exists($abouts->photo)) {
                Storage::disk('public')->delete($abouts->photo); // hapus foto lama
            }

            $path = $request->file('photo')->store('about', 'public');
            $abouts->photo = $path;
        }

        $abouts->save(); // ✅ Simpan perubahan

        return redirect()->route('admin.about')->with('success', 'About updated successfully.');
        }

    public function destroy($id)
{
    $abouts = About::findOrFail($id);

    // Hapus foto jika ada di storage
    if ($abouts->photo && Storage::disk('public')->exists($abouts->photo)) {
        Storage::disk('public')->delete($abouts->photo);
    }

    // Hapus data Hero dari DB
    $abouts->delete();

    return redirect()->route('admin.about')->with('success', 'About deleted successfully.');
}

}
