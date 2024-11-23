<x-app-layout>
    <x-slot name="header">
        <a href="/admin/dashboard">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Bienvenue') }} {{ Auth::user()->name }}
            </h2>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="text-2xl font-bold">Liste des Messages :</h1>
                    </div>
                    <br>
                    @if (session('success'))
                        <div class="alert alert-success mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive"> <!-- Responsiveness ajouté -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Répondu</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{ $message->name }}</td>
                                    <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td>
                                    <td>{{ $message->message }}</td>
                                    <td>
                                        @if(!$message->responded)
                                            <form action="{{ route('messages.responded', $message->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-primary">Marquer comme répondu</button>
                                            </form>
                                        @else
                                            <span class="badge bg-success">Répondu</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div> <!-- Fin du conteneur responsive -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
