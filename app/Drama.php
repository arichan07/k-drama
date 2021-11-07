<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drama extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
//        'image_path' => 'required',
        'val' => 'required',
    );
}
