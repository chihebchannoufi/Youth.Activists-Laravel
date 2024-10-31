<?php

namespace App\Http\Controllers;
use App\Models\Inscription;
use App\Models\User;

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
    public function accept($id)
{
    // Find the inscription by ID
    $inscription = Inscription::findOrFail($id);

    // Check if a user with the same email already exists
    $existingUser = User::where('email', $inscription->mail)->first();

    if ($existingUser) {
        // Optionally, you could handle this case differently
        return redirect()->back()->with('error', 'Un utilisateur avec cet email existe déjà.');
    }

    // Create a new user from the inscription data
    $user = User::create([
        'name' => $inscription->name,
        'email' => $inscription->mail,
        'password' => bcrypt('123456789'), // Set a default password or generate one
        'phone_number' => $inscription->tel, // Add phone number
        'birthdate' => $inscription->date_naissance, // Add birthdate
    ]);

    // Optionally, delete the inscription after acceptance
    $inscription->delete();

    // Set a success message
    return redirect()->back()->with('success', 'Membre accepté avec succès.');
}
public function destroy($id)
{
    // Find the inscription by ID
    $inscription = Inscription::findOrFail($id);

    // Delete the inscription
    $inscription->delete();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Inscription supprimée avec succès.');
}
}
