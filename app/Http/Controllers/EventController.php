<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('membre.events.home' ,compact('events'));
    }

    public function create(){
        return view('membre.events.create');
    }
    public function store(Request $request)
{
    $request->validate([
        'Event_Name' => 'required|string|max:255',
        'description' => 'required|string|max:2000',
        'Objectif' => 'required|string|max:255',
        'lieu' => 'required|string|max:255',
        'date' => 'required|date_format:Y-m-d\TH:i',
        'nom' => 'required|string|max:255',
    ]);

    Event::create([
        'Event_Name' => $request->Event_Name,
        'description' => $request->description,
        'Objectif' => $request->Objectif,
        'lieu' => $request->lieu,
        'date' => $request->date,
        'nom' => $request->nom,
    ]);

    return redirect()->route('events.create')->with('success', 'Événement créé avec succès.');
}
}
