<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="text-2xl font-bold">Liste des Utilisateurs :</h1>
                </div>
                <br>
                @if (session('success'))
                    <div class="alert alert-success mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="container mt-3">
                    <div class="row">
                        @foreach($users as $user)
                            <div class="col-md-6 mb-3">
                                <div class="card" style="width:70%">
                                    @if ($user->avatar)
                                        <img src="{{ asset('avatars/' . $user->avatar) }}" alt="Avatar" class="card-img-top">
                                    @else
                                        <img src="{{ asset('avatars/default.png') }}" alt="Default Avatar" class="card-img-top">
                                    @endif
                                    <div class="card-body">
                                        <h1 class="display-4">{{ $user->name }}</h1>
                                        <p>Membre</p>
                                        <br>
                                        <p>Né le : {{ $user->birthdate }}</p>
                                        <p>{{ $user->email }}</p>
                                        <p>{{ $user->phone_number }}</p>
                                        <br>
                                        <a href="#" class="btn btn-primary">Social Media</a>
                                    </div>
                                </div>
                            </div>
                            @if($loop->iteration % 2 == 0)
                                </div><div class="row">
                            @endif
                        @endforeach
                    </div>
                </div>
                
        </div>
    </div>
</div>
</div>
</x-app-layout>