<x-app-layout>
    <x-slot name="header">
        <a href="/admin/dashboard" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }} {{ Auth::user()->name }}
        </h2>
    </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="container mx-auto">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="text-2xl font-bold">Ajouter une formation :</h1>
                        <a href="{{ route('admin.formation') }}" class="btn btn-info">Liste des Formation</a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                            {{ session('success') }}
                        </div>
                    @endif
                        <br>
                    <form action="{{ route('admin.formation.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="titre" class="block text-gray-700">Titre</label>
                            <input type="text" id="titre" name="titre" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description</label>
                            <input type="text" id="description" name="description" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="lieu" class="block text-gray-700">Lieu</label>
                            <input type="text" id="lieu" name="lieu" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="date_debut" class="block text-gray-700">Date debut</label>
                            <input type="datetime-local" id="date_debut" name="date_debut" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="date_fin" class="block text-gray-700">Date fin</label>
                            <input type="datetime-local" id="date_fin" name="date_fin" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            Créer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>