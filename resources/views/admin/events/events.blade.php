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
                        <h1 class="text-2xl font-bold">Liste des événements :</h1>
                    </div>
                    <br>
                    
                    @if (session('success'))
                        <div class="alert alert-success mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    
                    @foreach($events as $event)
                    <p>{{ $event->nom }}</p>
                    <p>
                        L'événement <strong>{{ $event->Event_Name }}</strong> est <em>{{ $event->description }}</em>. 
                        Il a pour objectif <em>{{ $event->Objectif }}</em> et se tiendra à <strong>{{ $event->lieu }}</strong> 
                        le <strong>{{ $event->date }}</strong>.
                    </p>
                    <br>
                    <hr>
                    <br>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
