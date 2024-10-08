<?php

namespace App\Http\Controllers;
use App\Models\Formation;

use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index(){
        $formations = Formation::all();
        return view ('admin.formation.home',compact('formations'));
    }
    public function create(){
        return view('admin.formation.create');
    }
    public function store(Request $request)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string|max:2000',
        'lieu' => 'required|string|max:255',
        'date_debut' => 'required|date_format:Y-m-d\TH:i',
        'date_fin' => 'required|date_format:Y-m-d\TH:i|after_or_equal:date_debut',
    ]);

    Formation::create([
        'titre' => $request->titre,
        'description' => $request->description,
        'lieu' => $request->lieu,
        'date_debut' => $request->date_debut,
        'date_fin' => $request->date_fin,
    ]);

    return redirect()->route('admin.formation')->with('success', 'Formation créée avec succès.');
}
public function edit($id)
{
    $formation = Formation::findOrFail($id);
    return view('admin.formation.edit', compact('formation'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string|max:2000',
        'lieu' => 'required|string|max:255',
        'date_debut' => 'required|date_format:Y-m-d\TH:i',
        'date_fin' => 'required|date_format:Y-m-d\TH:i|after_or_equal:date_debut',
    ]);

    $formation = Formation::findOrFail($id);
    $formation->update($request->all());

    return redirect()->route('admin.formation')->with('success', 'Formation mise à jour avec succès.');
}
public function destroy(Formation $formation)
    {
        $formation->delete();
        return redirect()->route('admin.formation')->with('success', 'Formation deleted successfully');
    }
}
