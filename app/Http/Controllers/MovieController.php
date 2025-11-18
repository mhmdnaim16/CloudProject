<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function showListMovies(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $movies = Movie::where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->get();
        } else {
            $movies = Movie::all();
        }

        return view('ListMovies', compact('movies', 'search'));
    }

    public function show_CreateMovies()
    {
        return view('CreateMovie');
    }
    public function store_CreateMovies(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'duration' => 'required|integer|min:1',
            'production_date' => 'required|date',
            'description' => 'required|string',
            'synopsis' => 'nullable|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imagePath = $request->file('thumbnail')->store('thumbnails', 'public');
        $validatedData['thumbnail'] = $imagePath;
        Movie::create($validatedData);

        return redirect()->route('ListMovies');
    }
    public function show_EditMovies($id)
    {
        $movie = Movie::findOrFail($id);
        return view('UpdateMovie', compact('movie'));
    }
    public function store_EditMovies(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        
        $updatedData = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'duration' => 'required|integer|min:1',
            'production_date' => 'required|date',
            'description' => 'required|string',
            'synopsis' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $imagePath = $request->file('thumbnail')->store('thumbnails', 'public');
            $updatedData['thumbnail'] = $imagePath;
        }
        else {
            $updatedData['thumbnail'] = $movie->thumbnail;
        }

        $movie->update($updatedData);

        return redirect()->route('ListMovies');
    }
    public function deleteMovie($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('ListMovies');
    }
}
