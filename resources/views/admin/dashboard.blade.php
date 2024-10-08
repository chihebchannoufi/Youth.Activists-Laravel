<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- New content starts here -->
                <div class="p-6">
                    <a href="{{ route('admin.users.create') }}" class="text-black-500 hover:underline">
                        Ajouter un Membre
                    </a>
                </div>
                <!-- New content ends here -->
            </div>
            <br>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- New content starts here -->
                <div class="p-6">
                    <a href="{{ route('admin.formation.create') }}" class="text-black-500 hover:underline">
                        Ajouter une formation 
                    </a>
                </div>
                <!-- New content ends here -->
            </div>
            <br>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- New content starts here -->
                <div class="p-6">
                    <a href="{{ route('events.list') }}" class="text-black-500 hover:underline">
                        Les événements proposés
                    </a>
                </div>
                <!-- New content ends here -->
            </div>
            <br>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- New content starts here -->
                <div class="p-6">
                    <a href="{{ route('messages.Home') }}" class="text-black-500 hover:underline">
                        Messages
                    </a>
                </div>
                <!-- New content ends here -->
            </div>
            <br>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- New content starts here -->
                <div class="p-6">
                    <a href="{{ route('messages.inscription') }}" class="text-black-500 hover:underline">
                        Nouveau Membres
                    </a>
                </div>
                <!-- New content ends here -->
            </div>
        </div>
    </div>
</x-app-layout>
