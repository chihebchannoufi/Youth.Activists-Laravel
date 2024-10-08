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
                <div class="container mx-auto">
                    <h1 class="text-2xl font-bold mb-4">Modifier l'Utilisateur</h1>

                    @if (session('success'))
                        <div class="alert alert-success mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Nom & prénom</label>
                            <input type="text" id="name" name="name" class="form-input mt-1 block w-full border-gray-300 rounded" value="{{ $user->name }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="form-input mt-1 block w-full border-gray-300 rounded" value="{{ $user->email }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="phone_number" class="block text-gray-700">numéro de téléphone</label>
                            <input type="number" id="phone_number" name="phone_number" class="form-input mt-1 block w-full border-gray-300 rounded-md" value="{{ $user->phone_number }}">
                        </div>

                        <div class="mb-4">
                            <label for="birthdate" class="block text-gray-700">birthdate</label>
                            <input type="date" id="birthdate" name="birthdate" class="form-input mt-1 block w-full border-gray-300 rounded" value="{{ $user->birthdate }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="avatar" class="block text-gray-700">Avatar</label>
                            @if ($user->avatar)
                                <img src="{{ asset('avatars/' . $user->avatar) }}" alt="Current Avatar" class="mb-4" style="max-width: 100px;">
                            @endif
                            <input type="file" class="form-input mt-1 block w-full border-gray-300 rounded-md" id="avatar" name="avatar">
                        </div>
                        
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700">Mot de passe (laisser vide pour conserver le mot de passe actuel)</label>
                            <input type="password" id="password" name="password" class="form-input mt-1 block w-full border-gray-300 rounded">
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700">Confirmer le mot de passe</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-input mt-1 block w-full border-gray-300 rounded">
                        </div>

                        <button type="submit" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Mettre à jour
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>