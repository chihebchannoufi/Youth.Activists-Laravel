<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Formation;
use Illuminate\Http\Request;

class MembreController extends Controller
{
    public function index(){
        $users = User::all();
    return view('membre.user', compact('users'));
    }
    public function formation(){
        $formations = Formation::all();
    return view('membre.formation', compact('formations'));
    }
}
