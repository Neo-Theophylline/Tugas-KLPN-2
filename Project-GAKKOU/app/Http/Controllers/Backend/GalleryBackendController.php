<?php

namespace App\Http\Controllers\Backend;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryBackendController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();

        return view('page.backend.Gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('page.backend.Gallery.create');
    }

    public function store(Request $request)
    {
        // ✅ Ditambahkan validasi lebih detail
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'photo' => 'image',
        ]);

        // ✅ Simpan file ke storage/app/public/Gallery
        $path = $request->file('photo')->store('gallery', 'public');

        // ✅ Simpan data ke database
        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo'    => $path, // simpan path file ke DB
        ]);

        // ✅ Redirect ke index dengan flash message
        return redirect()->route('admin.gallery')->with('success', 'gallery created successfully.');
    }

    // 🔹 Menampilkan form edit
    public function edit($id)
    {
        // ✅ Diganti findOrFail agar otomatis 404 kalau data tidak ada
        $galleries = Gallery::findOrFail($id);

        // ✅ Dikirim variabel $galleries ke view edit
        return view('page.backend.Gallery.edit', compact('galleries'));
    }

    // 🔹 Update data Gallery
    public function update(Request $request, $id)
    {
        $galleries = Gallery::findOrFail($id); // ✅ Diganti findOrFail

        // ✅ Validasi dengan photo optional
        $request->validate([
            'title'    => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'photo' => 'image',
        ]);

        // ✅ Update field teks
        $galleries->title    = $request->title;
        $galleries->description = $request->description;

        // ✅ Jika ada file baru, hapus file lama dan simpan baru
        if ($request->hasFile('photo')) {
            if ($galleries->photo && Storage::disk('public')->exists($galleries->photo)) {
                Storage::disk('public')->delete($galleries->photo); // hapus foto lama
            }

            $path = $request->file('photo')->store('gallery', 'public');
            $galleries->photo = $path;
        }

        $galleries->save(); // ✅ Simpan perubahan

        return redirect()->route('admin.gallery')->with('success', 'Gallery updated successfully.');
    }

    // 🔹 Hapus data Gallery
    public function destroy($id)
    {
        $galleries = Gallery::findOrFail($id);

        // Hapus foto jika ada di storage
        if ($galleries->photo && Storage::disk('public')->exists($galleries->photo)) {
            Storage::disk('public')->delete($galleries->photo);
        }

        // Hapus data Hero dari DB
        $galleries->delete();

        return redirect()->route('admin.gallery')->with('success', 'Gallery deleted successfully.');
    }
        public function toggleStatus(Request $request)
    {
        $galleries = Gallery::findOrFail($request->id);
        $galleries->is_active = $request->status == 'true' ? 'active' : 'inactive';
        $galleries->save();

        return response()->json(['Succses' => true]);
    }
}
