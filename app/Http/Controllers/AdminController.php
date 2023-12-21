<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('is_admin', 0)->count();
        $admins = User::where('is_admin', 1)->count();
        $kandidats = Kandidat::all()->count();
        return view('admin.dashboard', compact('users', 'admins', 'kandidats'));
    }
}
