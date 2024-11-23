<x-app-layout>
    <x-slot name="header">
        <a href="/admin/dashboard">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Bienvenue') }} {{ Auth::user()->name }}
            </h2>
        </a>
    </x-slot>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="container mx-auto">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="text-2xl font-bold">Ajouter une formation :</h1>
                        <a href="{{ route('admin.formation') }}" class="btn btn-info"><i class="fa-solid fa-list"></i> Liste des Formation</a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                            {{ session('success') }}
                        </div>
                    @endif
                        <br>
                    <form action="{{ route('admin.formation.update', $formation->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="titre" class="block text-gray-700">Titre</label>
                            <input type="text" id="titre" name="titre" class="form-input mt-1 block w-full border-gray-300 rounded-md" value="{{ $formation->titre }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description</label>
                            <input type="text" id="description" name="description" class="form-input mt-1 block w-full border-gray-300 rounded-md" value="{{ $formation->description }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="lieu" class="block text-gray-700">Lieu</label>
                            <input type="text" id="lieu" name="lieu" class="form-input mt-1 block w-full border-gray-300 rounded-md" value="{{ $formation->lieu }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="date_debut" class="block text-gray-700">Date debut</label>
                            <input type="datetime-local" id="date_debut" name="date_debut" class="form-input mt-1 block w-full border-gray-300 rounded-md" value="{{ $formation->date_debut }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="date_fin" class="block text-gray-700">Date fin</label>
                            <input type="datetime-local" id="date_fin" name="date_fin" class="form-input mt-1 block w-full border-gray-300 rounded-md" value="{{ $formation->date_fin }}" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-wrench"></i> Mettre à jour
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateDebutInput = document.getElementById('date_debut');
            const form = dateDebutInput.closest('form');

            form.addEventListener('submit', function (e) {
                const dateDebut = new Date(dateDebutInput.value);
                const currentDate = new Date();

                if (dateDebut <= currentDate) {
                    e.preventDefault(); // Prevent form submission if the condition is not met
                    alert('La date de début doit être supérieure à la date et l\'heure actuelles.');
                }
            });
        });
    </script>
</x-app-layout>
