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
                <div class="container mt-3">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="text-2xl font-bold">Liste des Utilisateurs :</h1>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-info">Ajouter un utilisateur</a>
                    </div>
                    <br>
                    @if (session('success'))
                        <div class="alert alert-success mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th >ID</th>
                                <th >Avatar</th>
                                <th >Nom & prénom</th>
                                <th >Email</th>
                                <th >birthdate</th>
                                <th >numéro de téléphone</th>
                                <th >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td >{{ $user->id }}</td>
                                <td >
                                    @if ($user->avatar)
                                        <img src="{{ asset('avatars/' . $user->avatar) }}" alt="Avatar" class="w-16 h-16 object-cover rounded-full">
                                    @else
                                        <img src="{{ asset('avatars/default.png') }}" alt="Default Avatar" class="w-16 h-16 object-cover rounded-full">
                                    @endif
                                </td>
                                <td >{{ $user->name }}</td>
                                <td >{{ $user->email }}</td>
                                <td >{{ $user->birthdate }}</td>
                                <td >{{ $user->phone_number }}</td>
                                <td >
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
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
