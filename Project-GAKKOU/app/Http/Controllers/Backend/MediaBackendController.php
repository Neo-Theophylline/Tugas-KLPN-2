<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;

class MediaBackendController extends Controller
{
    public function index()
    {
        $medias = Media::all();

        return view('page.backend.Media.index', compact('medias'));
    }

    public function create()
    {
        return view('page.backend.Media.create');
    }

    public function store(Request $request)
    {
        // ✅ Ditambahkan validasi lebih detail
        $request->validate([
            'link' => 'required|string|max:255',
            'nameaccount' => 'required|string|max:255',
            'namemediasocial' => 'required|string|max:255',
            'photo' => 'image',
        ]);

        // ✅ Simpan file ke storage/app/public/Media
        $path = $request->file('photo')->store('media', 'public');

        // ✅ Simpan data ke database
        Media::create([
            'link' => $request->link,
            'nameaccount' => $request->nameaccount,
            'namemediasocial' => $request->namemediasocial,
            'photo'    => $path, // simpan path file ke DB
        ]);

        // ✅ Redirect ke index dengan flash message
        return redirect()->route('admin.media')->with('success', 'Media created successfully.');
    }

    // 🔹 Menampilkan form edit
    public function edit($id)
    {
        // ✅ Diganti findOrFail agar otomatis 404 kalau data tidak ada
        $medias = Media::findOrFail($id);

        // ✅ Dikirim variabel $medias ke view edit
        return view('page.backend.Media.edit', compact('medias'));
    }

    // 🔹 Update data Media
    public function update(Request $request, $id)
    {
        $medias = Media::findOrFail($id); // ✅ Diganti findOrFail

        // ✅ Validasi dengan photo optional
        $request->validate([
            'link' => 'required|string|max:255',
            'nameaccount' => 'required|string|max:255',
            'namemediasocial' => 'required|string|max:255',
            'photo' => 'image',
        ]);

        // ✅ Update field teks
        $medias->link    = $request->link;
        $medias->nameaccount = $request->nameaccount;
        $medias->namemediasocial = $request->namemediasocial;

        // ✅ Jika ada file baru, hapus file lama dan simpan baru
        if ($request->hasFile('photo')) {
            if ($medias->photo && Storage::disk('public')->exists($medias->photo)) {
                Storage::disk('public')->delete($medias->photo); // hapus foto lama
            }

            $path = $request->file('photo')->store('media', 'public');
            $medias->photo = $path;
        }

        $medias->save(); // ✅ Simpan perubahan

        return redirect()->route('admin.media')->with('success', 'Media updated successfully.');
    }

    // 🔹 Hapus data Media
    public function destroy($id)
    {
        $medias = Media::findOrFail($id);

        // Hapus foto jika ada di storage
        if ($medias->photo && Storage::disk('public')->exists($medias->photo)) {
            Storage::disk('public')->delete($medias->photo);
        }

        // Hapus data Hero dari DB
        $medias->delete();

        return redirect()->route('admin.media')->with('success', 'Media deleted successfully.');
    }
        public function toggleStatus(Request $request)
    {
        $medias = Media::findOrFail($request->id);
        $medias->is_active = $request->status == 'true' ? 'active' : 'inactive';
        $medias->save();

        return response()->json(['Succses' => true]);
    }
}
