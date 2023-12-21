<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Ui\Presets\React;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $pass = bcrypt('1234');
        // dd($pass);

        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nim      = $request->input('nim');
        $password   = $request->input('password');

        if (auth()->attempt(['nim' => $nim, 'password' => $password])) {
            Alert::success('Welcome', 'Anda berhasil login!');
            if (Auth()->user()->is_admin == 1) {
                return redirect(route('admin.dashboard'));
            } else {
                return redirect('/');
            }
        } else {
            Alert::error('Gagal!', 'NIM atau password salah!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
