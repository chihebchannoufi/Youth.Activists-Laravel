<x-app-layout>
    <x-slot name="header">
        <a href="/admin/dashboard">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Bienvenue') }} {{ Auth::user()->name }}
            </h2>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="text-2xl font-bold">Liste des Actions :</h1>
                    </div>
                    <br>
                    
                    @if (session('success'))
                        <div class="alert alert-success mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @forelse($events as $event)
                        <div class="mb-4 p-4 border rounded shadow-sm">
                            <h2 class="text-xl font-bold text-primary">{{ $event->nom }}</h2>
                            <p class="mt-2">
                                L'action <strong>{{ $event->Event_Name }}</strong> est un(e) <em>{{ $event->description }}</em>.
                            </p>
                            <p>
                                <strong>Objectif :</strong> {{ $event->Objectif }}
                            </p>
                            <p>
                                <strong>Lieu :</strong> {{ $event->lieu }}
                            </p>
                            <p>
                                <strong>Date :</strong> {{ $event->date }}
                            </p>
                        </div>
                        <hr class="my-4">
                    @empty
                        <div class="alert alert-warning mt-4">
                            <i class="fa-solid fa-info-circle"></i> Aucun événement trouvé.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
