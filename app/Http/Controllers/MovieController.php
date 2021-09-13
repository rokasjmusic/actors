<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Actor;
use Validator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movie.index', ['movies' => $movies]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actors = Actor::all();
        return view('movie.create', ['actors' => $actors]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
       [
           'title' => ['required', 'min:3', 'max:64'],
           'imdb_score' => ['required', 'min:3', 'max:64'],
       ]);
       if ($validator->fails()) {
        $request->flash();
        return redirect()->back()->withErrors($validator);
    }

        $movie = new Movie;
        $movie->title = $request->title;
        $movie->imdb_score = $request->imdb_score;
        $movie->actor_id = $request->actor_id;
        $movie->save();
        return redirect()->route('movie.index')->with('success_message', 'Sekmingai įrašytas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $actors = Actor::all();
        return view('movie.edit', ['movie' => $movie, 'actors' => $actors]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $validator = Validator::make($request->all(),
       [
           'title' => ['required', 'min:3', 'max:64'],
           'imdb_score' => ['required', 'min:3', 'max:64'],
       ]);
       if ($validator->fails()) {
        $request->flash();
        return redirect()->back()->withErrors($validator);
    }

        $movie->title = $request->title;
        $movie->imdb_score = $request->imdb_score;
        $movie->actor_id = $request->actor_id;
        $movie->save();
        return redirect()->route('movie.index')->with('success_message', 'Sėkmingai pakeistas.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movie.index')->with('success_message', 'Sekmingai ištrintas.');

    }
}
