<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceBackendController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('page.backend.Service.index', compact('services'));
    }

    public function create()
    {
        return view('page.backend.Service.create');
    }

    public function store(Request $request)
    {
        // ✅ Ditambahkan validasi lebih detail
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'photo' => 'image',
        ]);

        // ✅ Simpan file ke storage/app/public/Service
        $path = $request->file('photo')->store('service', 'public');

        // ✅ Simpan data ke database
        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo'    => $path, // simpan path file ke DB
        ]);

        // ✅ Redirect ke index dengan flash message
        return redirect()->route('admin.service')->with('success', 'Service created successfully.');
    }

    // 🔹 Menampilkan form edit
    public function edit($id)
    {
        // ✅ Diganti findOrFail agar otomatis 404 kalau data tidak ada
        $services = Service::findOrFail($id);

        // ✅ Dikirim variabel $services ke view edit
        return view('page.backend.Service.edit', compact('services'));
    }

    // 🔹 Update data Service
    public function update(Request $request, $id)
    {
        $services = Service::findOrFail($id); // ✅ Diganti findOrFail

        // ✅ Validasi dengan photo optional
        $request->validate([
            'title'    => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'photo' => 'image',
                ]);

        // ✅ Update field teks
        $services->title    = $request->title;
        $services->description = $request->description;

        // ✅ Jika ada file baru, hapus file lama dan simpan baru
        if ($request->hasFile('photo')) {
            if ($services->photo && Storage::disk('public')->exists($services->photo)) {
                Storage::disk('public')->delete($services->photo); // hapus foto lama
            }

            $path = $request->file('photo')->store('service', 'public');
            $services->photo = $path;
        }

        $services->save(); // ✅ Simpan perubahan

        return redirect()->route('admin.service')->with('success', 'Service updated successfully.');
    }

    // 🔹 Hapus data Service
    public function destroy($id)
    {
        $services = Service::findOrFail($id);

        // Hapus foto jika ada di storage
        if ($services->photo && Storage::disk('public')->exists($services->photo)) {
            Storage::disk('public')->delete($services->photo);
        }

        // Hapus data Hero dari DB
        $services->delete();

        return redirect()->route('admin.service')->with('success', 'Service deleted successfully.');
    }
        public function toggleStatus(Request $request)
    {
        $services = Service::findOrFail($request->id);
        $services->is_active = $request->status == 'true' ? 'active' : 'inactive';
        $services->save();

        return response()->json(['Succses' => true]);
    }
}
