<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = \App\Models\Movie::all();
        return response()->json($movies);
    }

    public function create()
    {
        return response()->json(['message' => 'Display form for creating movie']);
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $movie = \App\Models\Movie::create($request->all());
        return response()->json($movie, 201);
    }

    public function show(\App\Models\Movie $movie)
    {
        return response()->json($movie);
    }

    public function edit(\App\Models\Movie $movie)
    {
        return response()->json(['message' => 'Display form for editing movie', 'movie' => $movie]);
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\Movie $movie)
    {
        $movie->update($request->all());
        return response()->json($movie);
    }

    public function destroy(\App\Models\Movie $movie)
    {
        $movie->delete();
        return response()->json(null, 204);
    }
}
