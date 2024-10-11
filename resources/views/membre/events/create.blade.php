<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
                    <h2 class="text-2xl font-bold">Créer un événement :</h2>
                    <br><br>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <br>
                    <form action="{{ route('events.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="Event_Name" class="block text-gray-700">Nom de l'événement</label>
                            <input type="text" id="Event_Name" name="Event_Name" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description</label>
                            <input type="text" id="description" name="description" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="Objectif" class="block text-gray-700">Objectif</label>
                            <input type="text" id="Objectif" name="Objectif" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="lieu" class="block text-gray-700">Lieu</label>
                            <input type="text" id="lieu" name="lieu" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="date" class="block text-gray-700">Date</label>
                            <input type="datetime-local" id="date" name="date" class="form-input mt-1 block w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="nom" class="block text-gray-700">Nom</label>
                            <input type="text" id="nom" name="nom" class="form-input mt-1 block w-full border-gray-300 rounded-md" placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->name }}" readonly>
                            <input type="hidden" name="nom" value="{{ Auth::user()->name }}">
                        </div>
                        

                        <button type="submit" class="btn btn-primary">Créer l'événement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateDebutInput = document.getElementById('date');
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
