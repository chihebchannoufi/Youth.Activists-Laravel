<x-app-layout>
    <x-slot name="header">
        <a href="admin/dashboard">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }} {{ Auth::user()->name }}
        </h2>
    </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('membre.list') }}" class="text-black-500 hover:underline">
                        Vos collègues
                    </a>
                </div>
            </div>
        </div>
        <br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('membre.formation') }}" class="text-black-500 hover:underline">
                        Vos formations en cours 
                    </a>
                </div>
            </div>
            <br>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('events.create') }}" class="text-black-500 hover:underline">
                        Proposer des événements
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
