<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
        public function index()
    {
        $admins = User::whereIn('role', ['admin', 'superadmin'])
            ->orderByRaw("FIELD(role, 'superadmin', 'admin')")
            ->get();
        return view('admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:6|confirmed',
            'role'          => 'required|in:admin,superadmin',
            'jenis_kelamin' => 'nullable|in:L,P',
            'foto'          => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_admins', 'public');
        }

        User::create($data);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan');
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email,' . $id,
            'password'      => 'nullable|min:6|confirmed',
            'role'          => 'required|in:admin,superadmin',
            'jenis_kelamin' => 'nullable|in:L,P',
            'foto'          => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_admins', 'public');
        }

        $admin->update($data);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui');
    }

    public function destroy($id)
    {
        $adminLogin = auth()->user();
        $adminTarget = User::findOrFail($id);

        if ($adminTarget->isSuperAdmin() && !$adminLogin->isSuperAdmin()) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus Admin Utama.');
        }

        if ($adminLogin->id === $adminTarget->id) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus akun sendiri.');
        }

        $adminTarget->delete();

        return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus');
    }
}
