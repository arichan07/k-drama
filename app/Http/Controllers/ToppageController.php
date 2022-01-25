<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Drama;

class ToppageController extends Controller
{
   public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Drama::where('title', $cond_title)->get();
        } else {
            $posts = Drama::all();
        }
        return view('admin.kdrama.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
}
