<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class EditController extends Controller
{
    public function edit()
    {
        $Auth_data = Auth::id();
        $User_data = User::where('id', $Auth_data) -> first();
        return view('user/edit',['User' => $User_data]);
    }
}