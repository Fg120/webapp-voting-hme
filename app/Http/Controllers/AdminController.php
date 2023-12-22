<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('is_admin', 0)->count();
        $admins = User::where('is_admin', 1)->count();
        $s_vote = User::where('already_vote', 1)->count();
        $b_vote = User::where('already_vote', 0)->count();
        $kandidats = Kandidat::all()->count();
        return view('admin.dashboard', compact('users', 'admins', 'kandidats', 's_vote', 'b_vote'));
    }

    // FUNCTION SETTING
    public function setting()
    {
        $settings = Setting::all();
        return view('admin.setting.index', compact('settings'));
    }
    public function enable()
    {
        try {
            $settings = Setting::find(1);
            $settings->status = 1;
            $settings->save();

            Alert::success('Setting berhasil di aktifkan');
            return redirect(route('admin.setting.index'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function disable()
    {
        try {
            $settings = Setting::find(1);
            $settings->status = 0;
            $settings->save();

            Alert::success('Setting berhasil di noaktifkan');
            return redirect(route('admin.setting.index'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
