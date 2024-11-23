<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\Inscription;
use App\Models\Event;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function affiche(){
        $messages = Message::orderBy('responded', 'asc')->orderBy('created_at', 'desc')->get();
        return view ('admin.messages.home', compact('messages'));
    }
    public function markAsResponded($id)
{
    $message = Message::findOrFail($id);
    $message->responded = true;
    $message->save();

    return back()->with('success', 'Message marked as responded.');
}
    public function affiche_inscriptions(){
        $inscriptions = Inscription::all();
        return view ('admin.messages.inscription', compact('inscriptions'));
    }
    public function events(){
        $events = Event::all();
        return view ('admin.events.events', compact('events'));

    }
    
}
