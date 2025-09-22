<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Support\Facades\Storage;

class HistoryBackendController extends Controller
{
    public function index()
    {
        $histories = History::all();

        return view('page.backend.History.index', compact('histories'));
    }

    public function create()
    {
        return view('page.backend.History.create');
    }

    public function store(Request $request)
    {
        // ✅ Ditambahkan validasi lebih detail
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'photo' => 'image',
        ]);

        // ✅ Simpan file ke storage/app/public/History
        $path = $request->file('photo')->store('history', 'public');

        // ✅ Simpan data ke database
        History::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo'    => $path, // simpan path file ke DB
        ]);

        // ✅ Redirect ke index dengan flash message
        return redirect()->route('admin.history')->with('success', 'History created successfully.');
    }

    // 🔹 Menampilkan form edit
    public function edit($id)
    {
        // ✅ Diganti findOrFail agar otomatis 404 kalau data tidak ada
        $histories = History::findOrFail($id);

        // ✅ Dikirim variabel $histories ke view edit
        return view('page.backend.History.edit', compact('histories'));
    }

    // 🔹 Update data History
    public function update(Request $request, $id)
    {
        $histories = History::findOrFail($id); // ✅ Diganti findOrFail

        // ✅ Validasi dengan photo optional
        $request->validate([
            'title'    => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'photo' => 'image',
                ]);

        // ✅ Update field teks
        $histories->title    = $request->title;
        $histories->description = $request->description;

        // ✅ Jika ada file baru, hapus file lama dan simpan baru
        if ($request->hasFile('photo')) {
            if ($histories->photo && Storage::disk('public')->exists($histories->photo)) {
                Storage::disk('public')->delete($histories->photo); // hapus foto lama
            }

            $path = $request->file('photo')->store('history', 'public');
            $histories->photo = $path;
        }

        $histories->save(); // ✅ Simpan perubahan

        return redirect()->route('admin.history')->with('success', 'History updated successfully.');
    }

    // 🔹 Hapus data History
    public function destroy($id)
    {
        $histories = History::findOrFail($id);

        // Hapus foto jika ada di storage
        if ($histories->photo && Storage::disk('public')->exists($histories->photo)) {
            Storage::disk('public')->delete($histories->photo);
        }

        // Hapus data Hero dari DB
        $histories->delete();

        return redirect()->route('admin.history')->with('success', 'History deleted successfully.');
    }
        public function toggleStatus(Request $request)
    {
        $histories = History::findOrFail($request->id);
        $histories->is_active = $request->status == 'true' ? 'active' : 'inactive';
        $histories->save();

        return response()->json(['Succses' => true]);
    }
}
