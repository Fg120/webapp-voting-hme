<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // self::is_admin();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $users = User::paginate(50);
        // $users = User::all();
        return view('admin.mahasiswa.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = Request()->validate([
            'nim' => 'required|unique:users,nim',
            'nama' => 'required',
            'angkatan' => 'required',
        ], [
            'nim.required' => 'Masukkan NIM!',
            'nim.unique' => 'NIM sudah terdaftar!',
            'nama.required' => 'Masukkan nama!',
            'angkatan.required' => 'Masukkan angkatan!',
        ]);

        // $passtok = Str::random(10);
        $passtok = rand(0, 9999999999);
        $email = $request->nim . '@mail.unej.ac.id';
        $data = [
            'nim' => $request->nim,
            'email' => $email,
            'nama' => $request->nama,
            'hp' => $request->hp,
            'angkatan' => $request->angkatan,
            'password' => bcrypt($passtok),
            'token' => $passtok,
            'is_role' => $request->role,
        ];

        try {
            User::create($data);
            Alert::success('Berhasil', 'Data mahasiswa berhasil dibuat!');
            return redirect(route('admin.mahasiswa.index'));
        } catch (\Throwable $th) {
            dd($th);
            // Alert::error('GAGAL', $th);
            // return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswas = User::find($id);
        return view('admin.mahasiswa.show', compact('mahasiswas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswas = User::find($id);
        return view('admin.mahasiswa.edit', compact('mahasiswas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->nama = $request->nama;
        $user->angkatan = $request->angkatan;
        $user->is_admin = $request->is_admin;

        try {
            $user->save();
            Alert::success('Berhasil', 'Data mahasiswa berhasil dibuat!');
            return redirect(route('admin.mahasiswa.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        try {
            $user->delete();
            Alert::success('Berhasil', 'Data mahasiswa berhasil dihapus!');
            return redirect(route('admin.mahasiswa.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
