<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class PartnerBackendController extends Controller
{
    public function index()
    {
        $partners = Partner::all();

        return view('page.backend.Partner.index', compact('partners'));
    }

    public function create()
    {
        return view('page.backend.Partner.create');
    }

    public function store(Request $request)
    {
        // ✅ Ditambahkan validasi lebih detail
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string|max:120',
            'photo' => 'image',
        ]);

        // ✅ Simpan file ke storage/app/public/Partner
        $path = $request->file('photo')->store('partner', 'public');

        // ✅ Simpan data ke database
        Partner::create([
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'photo'    => $path, // simpan path file ke DB
        ]);

        // ✅ Redirect ke index dengan flash message
        return redirect()->route('admin.partner')->with('success', 'Partner created successfully.');
    }

    // 🔹 Menampilkan form edit
    public function edit($id)
    {
        // ✅ Diganti findOrFail agar otomatis 404 kalau data tidak ada
        $partners = Partner::findOrFail($id);

        // ✅ Dikirim variabel $partners ke view edit
        return view('page.backend.Partner.edit', compact('partners'));
    }

    // 🔹 Update data Partner
    public function update(Request $request, $id)
    {
        $partners = Partner::findOrFail($id); // ✅ Diganti findOrFail

        // ✅ Validasi dengan photo optional
        $request->validate([
            'name'    => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string|max:120',
            'photo' => 'image',
        ]);

        // ✅ Update field teks
        $partners->name    = $request->name;
        $partners->position    = $request->position;
        $partners->description = $request->description;

        // ✅ Jika ada file baru, hapus file lama dan simpan baru
        if ($request->hasFile('photo')) {
            if ($partners->photo && Storage::disk('public')->exists($partners->photo)) {
                Storage::disk('public')->delete($partners->photo); // hapus foto lama
            }

            $path = $request->file('photo')->store('partner', 'public');
            $partners->photo = $path;
        }

        $partners->save(); // ✅ Simpan perubahan

        return redirect()->route('admin.partner')->with('success', 'Partner updated successfully.');
    }

    // 🔹 Hapus data Partner
    public function destroy($id)
    {
        $partners = Partner::findOrFail($id);

        // Hapus foto jika ada di storage
        if ($partners->photo && Storage::disk('public')->exists($partners->photo)) {
            Storage::disk('public')->delete($partners->photo);
        }

        // Hapus data Hero dari DB
        $partners->delete();

        return redirect()->route('admin.partner')->with('success', 'Partner deleted successfully.');
    }
}
