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
                        <h1 class="text-2xl font-bold">Ajouter un Utilisateur :</h1>
                        <a href="{{ route('admin.users.home') }}" class="btn btn-info"><i class="fa-solid fa-list"> </i> Liste des Membres</a>
                    </div>
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
                    <br>
                    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Nom & prénom</label>
                            <input type="text" id="name" name="name" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="phone_number" class="block text-gray-700">numéro de téléphone</label>
                            <input type="number" id="phone_number" name="phone_number" class="form-input mt-1 block w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="birthdate" class="block text-gray-700">birthdate</label>
                            <input type="date" id="birthdate" name="birthdate" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="avatar">Avatar</label>
                            <input type="file" class="form-input mt-1 block w-full border-gray-300 rounded-md" id="avatar" name="avatar">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700">Mot de passe</label>
                            <input type="password" id="password" name="password" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700">Confirmer le mot de passe</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-regular fa-square-plus"></i> Créer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const phoneNumberInput = document.getElementById('phone_number');
            const form = phoneNumberInput.closest('form');

            form.addEventListener('submit', function (e) {
                const phoneNumber = phoneNumberInput.value.trim();

                // Check if the phone number starts with 9, 5, 2, or 46
                const validStart = /^(9|5|2|46)/.test(phoneNumber);

                // Check if the phone number length is exactly 8
                const validLength = phoneNumber.length === 8;

                if (!validStart){
                    e.preventDefault();
                    alert('Le numéro de téléphone doit commencer par 9, 5, 2');
                }
                if(!validLength){
                    e.preventDefault(); // Prevent form submission if invalid
                    alert('Le numéro de téléphone  doit comporter exactement 8 chiffres.');
                }
            });
        });
    </script>
</x-app-layout>
