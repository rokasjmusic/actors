<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Validator;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors = Actor::all();
        return view('actor.index', ['actors' => $actors]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actor.create');
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
           'name' => ['required', 'min:3', 'max:64'],
           'surname' => ['required', 'min:3', 'max:64'],
       ]);
       if ($validator->fails()) {
        $request->flash();
        return redirect()->back()->withErrors($validator);
    }

        $actor = new Actor;
        $actor->name = $request->name;
        $actor->surname = $request->surname;
        $actor->save();
        return redirect()->route('actor.index')->with('success_message', 'Sekmingai įrašytas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        $actors = Actor::all();
        return view('actor.show');
        // return view('movie.show',['movie' =>$movie ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        return view('actor.edit', ['actor' => $actor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actor $actor)
    {
        $validator = Validator::make($request->all(),
       [
           'name' => ['required', 'min:3', 'max:64'],
           'surname' => ['required', 'min:3', 'max:64'],
       ]);
       if ($validator->fails()) {
        $request->flash();
        return redirect()->back()->withErrors($validator);
    }

        $actor->name = $request->name;
        $actor->surname = $request->surname;
        $actor->save();
        return redirect()->route('actor.index')->with('success_message', 'Sėkmingai pakeistas.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        if($actor->actorMovies->count()){
            return redirect()->route('actor.index')->with('info_message', 'Trinti negalima, nes turi filmų sąraše.');
        }
        $actor->delete();
        return redirect()->route('actor.index')->with('success_message', 'Sekmingai ištrintas.');
 

    }
}
