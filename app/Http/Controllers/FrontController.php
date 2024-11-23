<?php

namespace App\Http\Controllers;
use App\Models\Projet;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('admin.projets.create');
    }
    public function list(){
        $projets = Projet::all();
        return view('admin.projets.home', compact('projets'));
    }
    public function store(Request $request)
{
    // Validation des champs
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
    ]);

    // Créer une nouvelle instance de Projet
    $projet = new Projet();
    $projet->title = $request->title;
    $projet->description = $request->description;

    // Sauvegarde des images si elles sont fournies
    if ($request->hasFile('image1')) {
        $image1Name = time().'_image1.'.$request->image1->extension();
        $request->image1->move(public_path('images/projets'), $image1Name);
        $projet->image1 = 'images/projets/'.$image1Name;
    }

    if ($request->hasFile('image2')) {
        $image2Name = time().'_image2.'.$request->image2->extension();
        $request->image2->move(public_path('images/projets'), $image2Name);
        $projet->image2 = 'images/projets/'.$image2Name;
    }

    if ($request->hasFile('image3')) {
        $image3Name = time().'_image3.'.$request->image3->extension();
        $request->image3->move(public_path('images/projets'), $image3Name);
        $projet->image3 = 'images/projets/'.$image3Name;
    }

    // Enregistrer les données dans la base de données
    $projet->save();

    // Redirection avec message de succès
    return redirect()->route('admin.projets.create')->with('success', 'Projet ajouté avec succès.');
}
public function destroy(Projet $projet)
{
    // Supprimer les fichiers d'images s'ils existent
    if ($projet->image1 && file_exists(public_path('storage/images/projets/' . $projet->image1))) {
        unlink(public_path('storage/images/projets/' . $projet->image1));
    }

    if ($projet->image2 && file_exists(public_path('storage/images/projets/' . $projet->image2))) {
        unlink(public_path('storage/images/projets/' . $projet->image2));
    }

    if ($projet->image3 && file_exists(public_path('storage/images/projets/' . $projet->image3))) {
        unlink(public_path('storage/images/projets/' . $projet->image3));
    }

    // Supprimer le projet de la base de données
    $projet->delete();

    // Rediriger avec un message de succès
    return redirect()->route('admin.projets')->with('success', 'Projet supprimé avec succès');
}
public function edit(Projet $projet)
{
    return view('admin.projets.edit', compact('projet'));
}
public function update(Request $request, Projet $projet)
{
    // Validation des données
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Mise à jour des informations du projet
    $projet->title = $request->title;
    $projet->description = $request->description;

    // Traitement des images si elles sont présentes
    if ($request->hasFile('image1')) {
        // Supprimer l'ancienne image si elle existe
        if ($projet->image1) {
            unlink(public_path($projet->image1));
        }
        $projet->image1 = $request->file('image1')->store('images/projets', 'public');
    }

    if ($request->hasFile('image2')) {
        if ($projet->image2) {
            unlink(public_path($projet->image2));
        }
        $projet->image2 = $request->file('image2')->store('images/projets', 'public');
    }

    if ($request->hasFile('image3')) {
        if ($projet->image3) {
            unlink(public_path($projet->image3));
        }
        $projet->image3 = $request->file('image3')->store('images/projets', 'public');
    }

    // Sauvegarde des modifications
    $projet->save();

    return redirect()->route('admin.projets', $projet->id)->with('success', 'Le projet a été mis à jour avec succès.');
}
}

