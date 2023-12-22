<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Setting;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(auth()->user()->already_vote);
        $users = Auth::user();
        if ($users->already_vote == 0 && $users->is_admin == 0) {
            $status = 0;
        } elseif ($users->is_admin == 1) {
            $status = 1;
        } else {
            $status = 2;
        }
        $settings = Setting::find(1);
        $kandidats = Kandidat::query()->orderBy('nomor')->get();
        // dd($kandidats);
        return view('home', compact('kandidats', 'settings', 'status'));
    }

    public function store(Request $request)
    {
        $attributes = Request()->validate([
            'pilihan' => 'required',
        ], [
            'pilihan.required' => 'Masukkan Piihan!',
        ]);
        try {
            $datpil = Kandidat::find($request)->first();
            $datpil->voter = $datpil->voter + 1;
            $datpil->save();

            $datusr = ModelsUser::find(Auth::user()->id);
            $datusr->already_vote = true;
            $datusr->save();

            Alert::success('Berhasil!', 'Anda telah melakukan voting');
            return redirect('/');
        } catch (\Throwable $th) {
            throw $th;
        }

        // dd($datusr);
    }
}
