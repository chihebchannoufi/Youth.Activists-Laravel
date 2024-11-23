<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenue') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="container py-5">
        <div class="row gy-4">
            <!-- Card 1: Ajouter un Membre -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-user-plus fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Ajouter un Membre</h5>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Ajouter
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Ajouter une Formation -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-book fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Ajouter une Formation</h5>
                        <a href="{{ route('admin.formation.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Ajouter
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Actions Proposées -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-calendar-plus fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Actions Proposées</h5>
                        <a href="{{ route('events.list') }}" class="btn btn-warning">
                            <i class="fas fa-eye"></i> Voir
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 4: Messages -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fa-brands fa-facebook-messenger fa-3x text-info mb-3"></i>
                        <h5 class="card-title">Messages</h5>
                        <a href="{{ route('messages.Home') }}" class="btn btn-info">
                            <i class="fas fa-envelope"></i> Consulter
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 5: Nouveau Membres -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-user-friends fa-3x text-danger mb-3"></i>
                        <h5 class="card-title">Nouveaux Membres</h5>
                        <a href="{{ route('messages.inscription') }}" class="btn btn-danger">
                            <i class="fas fa-user-check"></i> Vérifier
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 6: Ajouter des Projets -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-folder fa-3x text-secondary mb-3"></i>
                        <h5 class="card-title">Ajouter des Projets</h5>
                        <a href="{{ route('admin.projets.create') }}" class="btn btn-secondary">
                            <i class="fas fa-folder-plus"></i> Ajouter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
