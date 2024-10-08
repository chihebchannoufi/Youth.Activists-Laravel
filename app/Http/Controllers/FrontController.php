<?php

namespace App\Http\Controllers;
use App\Models\Message;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('inscription');
    }
    public function res(){
        return view('remerciment');
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'message' => 'required|string|max:2000',
    ]);

    Message::create($validated);

    return redirect()->route('remerciment');
}


}
