<?php

namespace App\Http\Controllers\Band;

use App\Models\Band;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function create(){
        return view('albums.create', [
            'title' => 'Album',
            'submit' => 'Create',
            'bands'  => Band::get()
        ]);
    }

    public function store(){
        dd('It works');
    }
}
