<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    protected $data;

    function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // dd($this->data);
        if ($this->data == 1) {
            // ALL USERS
            return User::all();
        }
        if ($this->data == 2) {
            // MAHASOSWA USERS
            return User::where('is_admin', 0)->get();
        }
        if ($this->data == 3) {
            // ADMIN USERS
            return User::where('is_admin', 1)->get();
        }
        if ($this->data == 4) {
            // MAHASOSWA NOT VOTE USERS
            return User::where('is_admin', 0)->where('already_vote', 0)->get();
        }
        if ($this->data == 5) {
            // MAHASOSWA VOTE USERS
            return User::where('is_admin', 0)->where('already_vote', 1)->get();
        }
    }
}
