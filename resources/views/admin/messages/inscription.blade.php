<x-app-layout>
    <x-slot name="header">
        <a href="/admin/dashboard">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Bienvenue') }} {{ Auth::user()->name }}
            </h2>
        </a>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="py-12">
        <div class="container">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="card-title text-center text-primary">Liste des futures membres</h1>
                    </div>
                    
                    @if (session('success'))
                        <div class="alert alert-success bg-light text-success border border-success rounded p-3">
                            <i class="fa-solid fa-check-circle"></i> {{ session('success') }}
                        </div>
                    @endif

                    @forelse ($inscriptions as $inscription)
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Membre #{{ $inscription->id }}</h5>
                                <hr>
                                <p><strong><i class="fa-solid fa-user"></i> Nom :</strong> {{ $inscription->name }}</p>
                                <p><strong><i class="fa-solid fa-calendar"></i> Date de naissance :</strong> {{ $inscription->date_naissance }}</p>
                                <p><strong><i class="fa-solid fa-map-marker-alt"></i> Lieu de naissance :</strong> {{ $inscription->lieu_naissance }}</p>
                                <p><strong><i class="fa-solid fa-home"></i> Lieu de résidence :</strong> {{ $inscription->lieu_residence }}</p>
                                <p><strong><i class="fa-solid fa-venus-mars"></i> Genre :</strong> 
                                    <span>{{ $inscription->genre }}</span>
                                </p>
                                <p><strong><i class="fa-solid fa-envelope"></i> Email :</strong> {{ $inscription->mail }}</p>
                                <p><strong><i class="fa-solid fa-phone"></i> Téléphone :</strong> {{ $inscription->tel }}</p>
                                <p><strong><i class="fa-solid fa-lightbulb"></i> Raison de rejoindre :</strong> {{ $inscription->raison_org }}</p>
                                <p><strong><i class="fa-solid fa-brain"></i> Compétences :</strong> {{ $inscription->competence }}</p>
                                <p><strong><i class="fa-solid fa-briefcase"></i> Expérience :</strong> {{ $inscription->experience }}</p>
                                <p><strong><i class="fa-solid fa-check"></i> Réponse :</strong> 
                                    <span>{{ $inscription->confirmation }}</span>
                                </p>

                                <div class="mt-4 d-flex gap-3">
                                    <!-- Accept Button -->
                                    <form action="{{ route('inscriptions.accept', $inscription->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa-solid fa-check-circle"></i> Accepter
                                        </button>
                                    </form>

                                    <!-- Reject Button -->
                                    <form action="{{ route('inscriptions.destroy', $inscription->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir rejeter cette inscription ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-times-circle"></i> Rejeter
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-warning text-center">
                            <i class="fa-solid fa-info-circle"></i> Aucune inscription trouvée.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
