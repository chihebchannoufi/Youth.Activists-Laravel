<x-app-layout>
    <x-slot name="header">
        <a href="/admin/dashboard">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Welcome') }} {{ Auth::user()->name }}
            </h2>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="text-2xl font-bold">Liste des futures Membres :</h1>
                    </div>
                    <br>
                    @if (session('success'))
                        <div class="alert alert-success mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @foreach($inscriptions as $inscription)
                    <p><strong>Numéro :</strong> {{ $inscription->id }}</p>
                    <br>
                        <div class="mb-4 p-3 border rounded shadow-sm bg-light">
                            <p><strong>Nom :</strong> {{ $inscription->name }}</p>
                            <p><strong>Date de naissance :</strong> {{ $inscription->date_naissance }}</p>
                            <p><strong>Lieu de naissance :</strong> {{ $inscription->lieu_naissance }}</p>
                            <p><strong>Lieu de résidence :</strong> {{ $inscription->lieu_residence }}</p>
                            <p><strong>Genre :</strong> {{ $inscription->genre }}</p>
                            <p><strong>Email :</strong> {{ $inscription->mail }}</p>
                            <p><strong>Téléphone :</strong> {{ $inscription->tel }}</p>
                            <p><strong>Raison de rejoindre l'organisation :</strong> {{ $inscription->raison_org }}</p>
                            <p><strong>Compétences :</strong> {{ $inscription->competence }}</p>
                            <p><strong>Expérience :</strong> {{ $inscription->experience }}</p>
                            <p><strong>Réponse :</strong> {{ $inscription->confirmation }}</p>
                        </div>
                        <hr>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
