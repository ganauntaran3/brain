<?php

namespace App\Http\Controllers\Band;

use App\Models\Genre;
use App\Models\Band;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function create(){
        $genres = Genre::get();
        return view('bands.create', [
            'genres' => $genres,
            'bands' => new Band,
            'submit' => "Create"
        ]);
    }

    public function store(){
        request()->validate([
            'name' => 'required',
            'thumbnail' => 'nullable|image|mimes:png,jpg',
            'genres' => 'required|array'
        ]);

        $band = Band::create([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'thumbnail' => request('thumbnail') ? request()->file('thumbnail')->store('images/band') : null,
        ]);

        $band->genres()->sync(request('genres'));

        return back()->with('success', 'Band successfully created');

    }

    public function table(){
        return view('bands.table', [
            'bands' => Band::latest()->paginate(10)
        ]);
    }

    public function edit(Band $band){
        return view('bands.edit', [
            'bands' => $band,
            'genres' => Genre::get(),
            'submit' => "Update"
        ]);
    }

    public function update(Band $band){
        request()->validate([
            'name' => 'required|unique:bands,name,'. $band->id,
            'thumbnail' => 'nullable|image|mimes:png,jpg',
            'genres' => 'required|array'
        ]);

            if (request('thumbnail')) {
                Storage::delete($band->thumbnail);
                $thumbnail = request()->file('thumbnail')->store('images/band');
            }elseif($band->thumbnail){
                $thumbnail = $band->thumbnail;
            }else {
                $thumbnail = null;
            }

        $band->update([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'thumbnail' => $thumbnail
        ]);

        $band->genres()->sync(request('genres'));

        return back()->with('success', 'Band successfully updated');

    }

    public function destroy(Band $band){
        Storage::delete($band->thumbnail);
        $band->genres()->detach();
        $band->delete();
    }
}
