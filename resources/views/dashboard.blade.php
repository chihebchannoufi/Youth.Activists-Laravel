<x-app-layout>
    <x-slot name="header">
        <a href="admin/dashboard" class="text-decoration-none">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Bienvenue') }} {{ Auth::user()->name }}
            </h2>
        </a>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="container py-5">
        <div class="row gy-4">
            <!-- Card 1: Vos collègues -->
            <div class="col-md-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-users fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Vos collègues</h5>
                        <a href="{{ route('membre.list') }}" class="btn btn-primary">
                            <i class="fas fa-eye"></i> Voir
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Vos formations en cours -->
            <div class="col-md-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-book-open-reader fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Vos formations en cours</h5>
                        <a href="{{ route('membre.formation') }}" class="btn btn-success">
                            <i class="fas fa-book"></i> Consulter
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Proposer des actions -->
            <div class="col-md-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-chalkboard-user fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Proposer des actions</h5>
                        <a href="{{ route('events.create') }}" class="btn btn-warning">
                            <i class="fas fa-plus-circle"></i> Proposer
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
