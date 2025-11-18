<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function show_Review_page($id)
    {
        $movie = Movie::with('reviews')->findOrFail($id);
        return view('Review', compact('movie'));
    }
    public function store(Request $request, $id){
        $request->validate([
            'review_text' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        $review = Review::create([
            'user_id' => 1,
            'movie_id' => $id,
            'review_text' => $request->input('review_text'),
            'rating' => $request->input('rating'),
        ]);
        
        return redirect()->route('ListMovies');
    }
}

