<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Support\Facades\Storage;

class WorkerBackendController extends Controller
{
    public function index()
    {
        $workers = Worker::all();

        return view('page.backend.Worker.index', compact('workers'));
    }

    public function create()
    {
        return view('page.backend.Worker.create');
    }

    public function store(Request $request)
    {
        // ✅ Ditambahkan validasi lebih detail
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'image',
        ]);

        // ✅ Simpan file ke storage/app/public/Worker
        $path = $request->file('photo')->store('worker', 'public');

        // ✅ Simpan data ke database
        Worker::create([
            'name' => $request->name,
            'description' => $request->description,
            'position' => $request->position,
            'photo'    => $path, // simpan path file ke DB
        ]);

        // ✅ Redirect ke index dengan flash message
        return redirect()->route('admin.worker')->with('success', 'Worker created successfully.');
    }

    // 🔹 Menampilkan form edit
    public function edit($id)
    {
        // ✅ Diganti findOrFail agar otomatis 404 kalau data tidak ada
        $workers = Worker::findOrFail($id);

        // ✅ Dikirim variabel $workers ke view edit
        return view('page.backend.Worker.edit', compact('workers'));
    }

    // 🔹 Update data Worker
    public function update(Request $request, $id)
    {
        $workers = Worker::findOrFail($id); // ✅ Diganti findOrFail

        // ✅ Validasi dengan photo optional
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'image',
        ]);

        // ✅ Update field teks
        $workers->name    = $request->name;
        $workers->description = $request->description;
        $workers->position = $request->position;

        // ✅ Jika ada file baru, hapus file lama dan simpan baru
        if ($request->hasFile('photo')) {
            if ($workers->photo && Storage::disk('public')->exists($workers->photo)) {
                Storage::disk('public')->delete($workers->photo); // hapus foto lama
            }

            $path = $request->file('photo')->store('worker', 'public');
            $workers->photo = $path;
        }

        $workers->save(); // ✅ Simpan perubahan

        return redirect()->route('admin.worker')->with('success', 'Worker updated successfully.');
    }

    // 🔹 Hapus data Worker
   public function destroy($id)
{
    $workers = Worker::findOrFail($id);

    // Hapus foto jika ada di storage
    if ($workers->photo && Storage::disk('public')->exists($workers->photo)) {
        Storage::disk('public')->delete($workers->photo);
    }

    // Hapus data Hero dari DB
    $workers->delete();

    return redirect()->route('admin.worker')->with('success', 'Worker deleted successfully.');
}
}
