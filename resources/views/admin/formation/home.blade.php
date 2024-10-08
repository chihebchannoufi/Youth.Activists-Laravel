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
                        <h1 class="text-2xl font-bold">Liste des Formations :</h1>
                        <a href="{{ route('admin.formation.create') }}" class="btn btn-info">Ajouter une formation</a>
                    </div>
                    <br>
                    @if (session('success'))
                        <div class="alert alert-success mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-borderless table table-hover">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Lieu</th>
                                <th>Date debut</th>
                                <th>Date fin</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($formations as $formation)
                            <tr>
                                <td>{{ $formation->titre }}</td>
                                <td>{{ $formation->description }}</td>
                                <td>{{ $formation->lieu }}</td>
                                <td>{{ $formation->date_debut }}</td>
                                <td>{{ $formation->date_fin }}</td>
                                <td>
                                    <a href="{{ route('admin.formation.edit', $formation) }}" class="btn btn-warning btn-sm  ">Modifier</a>
                                    <form action="{{ route('admin.formation.destroy', $formation) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm  ">Supprimer</button>
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
</x-app-layout>
