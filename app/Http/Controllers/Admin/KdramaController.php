<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KdramaController extends Controller
{
    public function add()
  {
      return view('admin.kdrama.create');
  }
  
   public function create()
  {
      return redirect('admin.kdrama.create');
  }
}
