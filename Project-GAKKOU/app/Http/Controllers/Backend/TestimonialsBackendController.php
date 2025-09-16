<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class TestimonialsBackendController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('page.backend.Testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('page.backend.Testimonial.create');
    }

    public function store(Request $request)
    {
        // ✅ Ditambahkan validasi lebih detail
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'stars' => 'required|integer|min:1|max:5',
            'photo' => 'image',
        ]);

        // ✅ Simpan file ke storage/app/public/testimonial
        $path = $request->file('photo')->store('testimonial', 'public');

        // ✅ Simpan data ke database
        Testimonial::create([
            'name' => $request->name,
            'description' => $request->description,
            'stars' => $request->stars,
            'photo'    => $path, // simpan path file ke DB
        ]);

        // ✅ Redirect ke index dengan flash message
        return redirect()->route('admin.testimonial')->with('success', 'Testimonial created successfully.');
    }

    // 🔹 Menampilkan form edit
    public function edit($id)
    {
        // ✅ Diganti findOrFail agar otomatis 404 kalau data tidak ada
        $testimonials = Testimonial::findOrFail($id);

        // ✅ Dikirim variabel $testimonials ke view edit
        return view('page.backend.Testimonial.edit', compact('testimonials'));
    }

    // 🔹 Update data testimonial
    public function update(Request $request, $id)
    {
        $testimonials = Testimonial::findOrFail($id); // ✅ Diganti findOrFail

        // ✅ Validasi dengan photo optional
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'stars' => 'required|integer|min:1|max:5',
            'photo' => 'image',
        ]);

        // ✅ Update field teks
        $testimonials->name    = $request->name;
        $testimonials->description = $request->description;
        $testimonials->stars = $request->stars;

        // ✅ Jika ada file baru, hapus file lama dan simpan baru
        if ($request->hasFile('photo')) {
            if ($testimonials->photo && Storage::disk('public')->exists($testimonials->photo)) {
                Storage::disk('public')->delete($testimonials->photo); // hapus foto lama
            }

            $path = $request->file('photo')->store('testimonial', 'public');
            $testimonials->photo = $path;
        }

        $testimonials->save(); // ✅ Simpan perubahan

        return redirect()->route('admin.testimonial')->with('success', 'Testimonial updated successfully.');
    }

    // 🔹 Hapus data testimonial
    public function destroy($id)
    {
        $testimonials = Testimonial::findOrFail($id);

        // Hapus foto jika ada di storage
        if ($testimonials->photo && Storage::disk('public')->exists($testimonials->photo)) {
            Storage::disk('public')->delete($testimonials->photo);
        }

        // Hapus data Hero dari DB
        $testimonials->delete();

        return redirect()->route('admin.testimonial')->with('success', 'Testimonial deleted successfully.');
    }
}
