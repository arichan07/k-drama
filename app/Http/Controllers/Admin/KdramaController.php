<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Drama;


class KdramaController extends Controller
{
    public function add()
    {
        return view('admin.kdrama.create');
    }
    

    public function create(Request $request)
    {
        $this->validate($request, Drama::$rules);
        
        $kdrama = new Drama();
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
//            $kdrama->image_path = basename($path);
            $kdrama->image_path = $path;
        } else {
            $kdrama->image_path = null;
        }

        unset($form['_token']);
        unset($form['image']);
        
        $kdrama->fill($form);
        $kdrama->save();

        return redirect('admin/kdrama/');
    }
    

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


    public function edit(Request $request)
    {
        $kdrama = Drama::find($request->id);
        if (empty($kdrama)) {
            abort(404);    
        }
        return view('admin.kdrama.edit', ['kdrama_form' => $kdrama]);
    }
    

    public function update(Request $request)
    { 
        $this->validate($request, Drama::$rules);
        $kdrama = Drama::find($request->id);
        if (empty($kdrama)) {
            abort(404);    
        }
        
        $kdrama_form = $request->all();
        
        if ($request->remove == 'true') {
            $kdrama_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            //$kdrama_form['image_path'] = basename($path);
            $kdrama_form['image_path'] = $path;
        } else {
            $kdrama_form['image_path'] = $kdrama->image_path;
        }

        unset($kdrama_form['image']);
        unset($kdrama_form['remove']);
        unset($kdrama_form['_token']);

        $kdrama->fill($kdrama_form)->save();
        return redirect('admin/kdrama/');
    }
    
    
    public function delete(Request $request)
    { 
        $kdrama = Drama::find($request->id);
        $kdrama->delete();
        return redirect('admin/kdrama/');
    }
}