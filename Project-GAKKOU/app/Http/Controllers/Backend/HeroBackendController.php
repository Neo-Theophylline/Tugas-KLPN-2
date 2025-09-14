<?php

namespace App\Http\Controllers\Backend;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HeroBackendController extends Controller
{
    // 🔹 Menampilkan semua data Hero
    public function index()
    {
        $heroes = Hero::all();
        return view('page.backend.Hero.index', compact('heroes'));
    }

    // 🔹 Menampilkan form create Hero
    public function create()
    {
        return view('page.backend.Hero.create');
    }

    // 🔹 Menyimpan data Hero baru
    public function store(Request $request)
    {
        // ✅ Ditambahkan validasi lebih detail
        $request->validate([
            'title'    => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'photo'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ✅ Simpan file ke storage/app/public/hero
        $path = $request->file('photo')->store('hero', 'public');

        // ✅ Simpan data ke database
        Hero::create([
            'title'    => $request->title,
            'subtitle' => $request->subtitle,
            'photo'    => $path, // simpan path file ke DB
        ]);

        // ✅ Redirect ke index dengan flash message
        return redirect()->route('admin.hero')->with('success', 'Hero created successfully.');
    }

    // 🔹 Menampilkan form edit
    public function edit($id)
    {
        // ✅ Diganti findOrFail agar otomatis 404 kalau data tidak ada
        $hero = Hero::findOrFail($id);

        // ✅ Dikirim variabel $hero ke view edit
        return view('page.backend.Hero.edit', compact('hero'));
    }

    // 🔹 Update data Hero
    public function update(Request $request, $id)
    {
        $hero = Hero::findOrFail($id); // ✅ Diganti findOrFail

        // ✅ Validasi dengan photo optional
        $request->validate([
            'title'    => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ✅ Update field teks
        $hero->title    = $request->title;
        $hero->subtitle = $request->subtitle;

        // ✅ Jika ada file baru, hapus file lama dan simpan baru
        if ($request->hasFile('photo')) {
            if ($hero->photo && Storage::disk('public')->exists($hero->photo)) {
                Storage::disk('public')->delete($hero->photo); // hapus foto lama
            }

            $path = $request->file('photo')->store('hero', 'public');
            $hero->photo = $path;
        }

        $hero->save(); // ✅ Simpan perubahan

        return redirect()->route('admin.hero')->with('success', 'Hero updated successfully.');
    }

    // 🔹 Hapus data Hero
    public function destroy($id)
    {
        $hero = Hero::findOrFail($id);

        // ✅ Hapus foto jika ada di storage
        if ($hero->photo && Storage::disk('public')->exists($hero->photo)) {
            Storage::disk('public')->delete($hero->photo);
        }

        $hero->delete(); // ✅ Hapus data Hero dari DB

        return redirect()->route('admin.hero')->with('success', 'Hero deleted successfully.');
    }
}
