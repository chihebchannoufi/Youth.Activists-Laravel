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
                        <h1 class="text-2xl font-bold">Ajouter un projet :</h1>
                        <a href="{{ route('admin.projets') }}" class="btn btn-info">
                            <i class="fa-solid fa-list"></i> Liste des Projets
                        </a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                            {{ session('success') }}
                        </div>
                    @endif
                    <br>
                    <form action="{{ route('admin.projets.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Titre</label>
                            <input type="text" id="title" name="title" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description</label>
                            <textarea id="description" name="description" class="form-input mt-1 block w-full border-gray-300 rounded-md" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="image1" class="block text-gray-700">Image 1</label>
                            <input type="file" id="image1" name="image1" class="form-input mt-1 block w-full border-gray-300 rounded-md" accept="image/*">
                        </div>
                        <div class="mb-4">
                            <label for="image2" class="block text-gray-700">Image 2</label>
                            <input type="file" id="image2" name="image2" class="form-input mt-1 block w-full border-gray-300 rounded-md" accept="image/*">
                        </div>
                        <div class="mb-4">
                            <label for="image3" class="block text-gray-700">Image 3</label>
                            <input type="file" id="image3" name="image3" class="form-input mt-1 block w-full border-gray-300 rounded-md" accept="image/*">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-regular fa-square-plus"></i> Créer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
