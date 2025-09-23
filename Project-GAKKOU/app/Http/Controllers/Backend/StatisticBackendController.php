<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Support\Facades\Storage;

class StatisticBackendController extends Controller
{
    public function index()
    {
        $statistics = Statistic::all();

        return view('page.backend.Statistic.index', compact('statistics'));
    }

    public function create()
    {
        return view('page.backend.Statistic.create');
    }

    public function store(Request $request)
    {
        // ✅ Ditambahkan validasi lebih detail
        $request->validate([
            'name' => 'required|max:255',
            'amount' => 'required',
        ]);

        // ✅ Simpan data ke database
        Statistic::create([
            'name' => $request->name,
            'amount' => $request->amount,
        ]);

        // ✅ Redirect ke index dengan flash message
        return redirect()->route('admin.statistic')->with('success', 'Statistic created successfully.');
    }

    // 🔹 Menampilkan form edit
    public function edit($id)
    {
        // ✅ Diganti findOrFail agar otomatis 404 kalau data tidak ada
        $statistics = Statistic::findOrFail($id);

        // ✅ Dikirim variabel $statistics ke view edit
        return view('page.backend.Statistic.edit', compact('statistics'));
    }

    // 🔹 Update data Statistic
    public function update(Request $request, $id)
    {
        $statistics = Statistic::findOrFail($id); // ✅ Diganti findOrFail

        // ✅ Validasi dengan photo optional
        $request->validate([
            'name'    => 'required|string|max:255',
            'amount' => 'required',
                ]);

        // ✅ Update field teks
        $statistics->name    = $request->name;
        $statistics->amount = $request->amount;


        return redirect()->route('admin.statistic')->with('success', 'Statistic updated successfully.');
    }

    // 🔹 Hapus data Statistic
    public function destroy($id)
    {
        $statistics = Statistic::findOrFail($id);

        // Hapus data Hero dari DB
        $statistics->delete();

        return redirect()->route('admin.statistic')->with('success', 'Statistic deleted successfully.');
    }
        public function toggleStatus(Request $request)
    {
        $statistics = Statistic::findOrFail($request->id);
        $statistics->is_active = $request->status == 'true' ? 'active' : 'inactive';
        $statistics->save();

        return response()->json(['Succses' => true]);
    }
}
