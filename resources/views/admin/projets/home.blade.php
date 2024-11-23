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
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="text-2xl font-bold">Liste des Projets :</h1>
                        <a href="{{ route('admin.projets.create') }}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Ajouter un projet</a>
                    </div>
                    <br>
                    @if (session('success'))
                        <div class="alert alert-success mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Image 1</th>
                                <th>Image 2</th>
                                <th>Image 3</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projets as $projet)
                                <tr>
                                    <td>{{ $projet->title }}</td>
                                    <td>{{ $projet->description }}</td>
                                    <td>
                                        @if($projet->image1)
                                            <img src="{{ asset($projet->image1) }}" alt="Image 1" class="w-16 h-16 object-cover rounded-full">
                                        @else
                                            <span>Aucune image</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($projet->image2)
                                            <img src="{{ asset($projet->image2) }}" alt="Image 2" class="w-16 h-16 object-cover rounded-full">
                                        @else
                                            <span>Aucune image</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($projet->image3)
                                            <img src="{{ asset($projet->image3) }}" alt="Image 3" class="w-16 h-16 object-cover rounded-full">
                                        @else
                                            <span>Aucune image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('projets.edit', $projet->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i> Modifier</a>
                                        <form action="{{ route('projets.destroy', $projet->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
