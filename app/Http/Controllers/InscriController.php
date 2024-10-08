<?php

namespace App\Http\Controllers;
use App\Models\Inscription;

use Illuminate\Http\Request;

class InscriController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'lieu' => 'required|string|max:255',
            'résidence' => 'required|string|max:255',
            'genre' => 'required|in:Homme,Femme',
            'mail' => 'required|email|unique:inscriptions,mail',  // Table 'inscriptions'
            'tel' => 'required|string|max:20',
            'org' => 'required|string',
            'compétence' => 'nullable|string',
            'expérience' => 'required|in:oui,non',
            'confirmation' => 'nullable|string',
        ]);

        // Créer un nouvel enregistrement dans la table `inscriptions`
        Inscription::create([
            'name' => $request->name,
            'date_naissance' => $request->date,
            'lieu_naissance' => $request->lieu,
            'lieu_residence' => $request->résidence,
            'genre' => $request->genre,
            'mail' => $request->mail,
            'tel' => $request->tel,
            'raison_org' => $request->org,
            'competence' => $request->compétence,
            'experience' => $request->expérience,
            'confirmation' => $request->confirmation,
        ]);

return redirect()->route('inscription')->with('success', 'Le formulaire a été soumis avec succès.');

    }
}
