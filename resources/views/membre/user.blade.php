<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenue') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="text-2xl font-bold">Liste des Utilisateurs :</h1>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="container mt-3">
                        <div class="row">
                            @foreach($users as $user)
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="card mx-auto" style="max-width: 100%; width: 300px;">
                                        <div class="card-img-top-container" style="max-width: 100%; margin: 0 auto;">
                                            @if ($user->avatar)
                                                <img src="{{ asset('avatars/' . $user->avatar) }}" alt="{{ $user->name }}'s Avatar" class="card-img-top" style="width: 100%; height: auto;">
                                            @else
                                                <img src="https://png.pngtree.com/png-vector/20220628/ourmid/pngtree-user-profile-avatar-vector-admin-png-image_5289691.png" alt="Default Avatar" class="card-img-top" style="width: 100%; height: auto;">
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h1 class="display-4 text-center">{{ $user->name }}</h1>
                                            <p class="text-center text-muted">Membre</p>
                                            <p><strong>Né le :</strong> {{ $user->birthdate }}</p>
                                            <p><strong>Email :</strong> {{ $user->email }}</p>
                                            <p><strong>Téléphone :</strong> {{ $user->phone_number }}</p>
                                            <div class="d-flex justify-content-center mt-3">
                                                <a href="{{ $user->facebook_profile ?? '#' }}" class="mx-2" target="_blank">
                                                    <i class="fab fa-facebook fa-2x"></i>
                                                </a>
                                                <a href="{{ $user->instagram_profile ?? '#' }}" class="mx-2" target="_blank">
                                                    <i class="fab fa-instagram fa-2x"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if($loop->iteration % 2 == 0)
                                    </div><div class="row">
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
