<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
 
    public function index()
    {
        $users = User::all();
        return view('page.backend.User.index', compact('users'));
    }

    public function create()
    {
        return view('page.backend.User.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success','User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('page.backend.User.edit', compact('user'));
    }

   public function update(Request $request, $id)
{
    // Ambil user berdasarkan ID
    $user = User::findOrFail($id);

    // Validasi data
    $request->validate([
        'email'    => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6',
    ]);

    // Update email
    $user->email = $request->email;
    $user->name = $request->name;

    // Update password hanya jika diisi
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    // Simpan perubahan
    $user->save();

    // Redirect dengan pesan sukses
    return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','User berhasil dihapus');
    }
                    public function toggleStatus(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->is_active = $request->status == 'true' ? 'active' : 'inactive';
        $user->save();

        return response()->json(['Succses' => true]);
    }
}
