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
                <div class="container">
                    <h1 class="text-2xl font-bold mb-4">Modifier le projet : {{ $projet->title }}</h1>

                    <!-- Affichage des messages de succès ou d'erreur -->
                    @if (session('success'))
                        <div class="alert alert-success mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('projets.update', $projet->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Champ titre -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $projet->title) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Champ description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ old('description', $projet->description) }}</textarea>
                            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Champs d'images -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Image 1</label>
                            <input type="file" name="image1" class="mt-1 block w-full text-sm text-gray-500 border-gray-300 rounded-md">
                            @if($projet->image1)
                                <img src="{{ asset($projet->image1) }}" alt="Image 1" class="mt-2 w-16 h-16 object-cover rounded-full">
                            @else
                                <span>Aucune image actuelle</span>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Image 2</label>
                            <input type="file" name="image2" class="mt-1 block w-full text-sm text-gray-500 border-gray-300 rounded-md">
                            @if($projet->image2)
                                <img src="{{ asset($projet->image2) }}" alt="Image 2" class="mt-2 w-16 h-16 object-cover rounded-full">
                            @else
                                <span>Aucune image actuelle</span>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Image 3</label>
                            <input type="file" name="image3" class="mt-1 block w-full text-sm text-gray-500 border-gray-300 rounded-md">
                            @if($projet->image3)
                                <img src="{{ asset($projet->image3) }}" alt="Image 3" class="mt-2 w-16 h-16 object-cover rounded-full">
                            @else
                                <span>Aucune image actuelle</span>
                            @endif
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-save"></i> Sauvegarder les modifications
                            </button>
                        </div>
                    </form>

                    <!-- Lien pour revenir à la liste des projets -->
                    <div class="mt-4">
                        <a href="{{ route('admin.projets') }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fa-solid fa-arrow-left"></i> Retour à la liste des projets
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
