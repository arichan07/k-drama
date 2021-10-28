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
        
        $news = new Kdrama();
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $kdrama->image_path = basename($path);
        } else {
            $kdrama->image_path = null;
        }

        unset($form['_token']);
        unset($form['image']);
        
        $kdrama->fill($form);
        $kdrama->save();

        return redirect('admin/kdrama/create');
    }

    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Kdrama::where('title', $cond_title)->get();
        } else {
            $posts = Kdrama::all();
        }
        return view('admin.kdrama.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }


    public function edit(Request $request)
    {

        $kdrama = Kdrama::find($request->id);
        if (empty($kdrama)) {
            abort(404);    
    }
        return view('admin.kdrama.edit', ['kdrama_form' => $kdrama]);
    }


    public function update(Request $request)
    {
      
        $this->validate($request, Kdrama::$rules);
        $kdrama = Kdrama::find($request->id);
        $kdrama_form = $request->all();
        unset($kdrama_form['_token']);
        
        $kdrama->fill($kdrama_form)->save();
        
        return redirect('admin/kdrama');
    }
}