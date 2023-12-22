<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Kandidat!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $kandidats = Kandidat::all();
        return view('admin.kandidat.index', compact('kandidats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kandidat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = Request()->validate([
            'nomor' => 'required',
            'nim' => 'required|unique:kandidats,nim|unique:users,nim',
            'nama' => 'required',
            'angkatan' => 'required',
            'foto' => 'required',
        ], [
            'nomor.required' => 'Masukkan nomor!',
            'nim.required' => 'Masukkan NIM!',
            'nim.unique' => 'NIM sudah terdaftar!',
            'nama.required' => 'Masukkan nama!',
            'angkatan.required' => 'Masukkan angkatan!',
            'foto.required' => 'Masukkan foto!',
        ]);

        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        $photo_path = $request->file('foto')->storeAs('public/kandidat', $filename);
        //menghapus string 'public/' karena dapat menyulitkan pemanggilan di blade.

        $photo_path = str_replace('public/', '', $photo_path);

        try {
            $data = [
                'nomor' => $request->nomor,
                'nim' => $request->nim,
                'nama' => $request->nama,
                'angkatan' => $request->angkatan,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'foto' => $photo_path,
            ];
            Kandidat::create($data);

            Alert::success('Kandidat berhasil ditambahkan');
            return redirect('/admin/kandidat');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kandidats = Kandidat::find($id);
        return view('admin.kandidat.show', compact('kandidats'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kandidats = Kandidat::find($id);
        return view('admin.kandidat.edit', compact('kandidats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kandidat = Kandidat::find($id);
        if ($request->foto != '') {
            Storage::delete('public/' . $kandidat->foto);
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $photo_path = $request->file('foto')->storeAs('public/kandidat', $filename);
            //menghapus string 'public/' karena dapat menyulitkan pemanggilan di blade.
            $photo_path = str_replace('public/', '', $photo_path);

            $kandidat->foto = $photo_path;
        }

        $kandidat->nomor = $request->nomor;
        $kandidat->nama = $request->nama;
        $kandidat->angkatan = $request->angkatan;
        $kandidat->visi = $request->visi;
        $kandidat->misi = $request->misi;
        // if ($request->photo != '') {
        //     Storage::delete('public/' . $kandidat->photo);
        //     $kandidat->delete();
        // }
        $kandidat->save();

        Alert::success('Kandidat berhasil diupdate');
        return redirect(route('admin.kandidat.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kandidat = Kandidat::find($id);
        try {
            Storage::delete('public/' . $kandidat->photo);
            $kandidat->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }
        Alert::success('Kandidat berhasil dihapus');
        return redirect(route('admin.kandidat.index'));
    }
}
