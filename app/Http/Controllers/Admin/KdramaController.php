<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kdrama; 

class KdramaController extends Controller
{
    public function add()
    {
        return view('admin.kdrama.create');
    }
    
  
    public function create(Request $request)
    {
        $this->validate($request, Kdrama::$rules);
        ​
        $kdrama = new Kdrama;
        $form = $request->all();
        ​
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $kdrama->image_path = null;
        }
        ​
        unset($form['_token']);
        unset($form['image']);
        ​
        $kdrama->fill($form);
        $kdrama->save();
        
        return redirect('admin.kdrama.create');
    }
}
