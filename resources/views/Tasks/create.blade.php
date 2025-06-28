@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8 bg-white shadow-md rounded-2xl p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Créer une nouvelle tâche</h2>

    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="title" class="block text-gray-700 font-medium mb-1">Titre</label>
            <input type="text" id="title" name="title" placeholder="Titre"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-fuchsia-500 focus:ring focus:ring-fuchsia-200">
        </div>

        <div>
            <label for="description" class="block text-gray-700 font-medium mb-1">Description</label>
            <textarea id="description" name="description" placeholder="Description" rows="4"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-fuchsia-500 focus:ring focus:ring-fuchsia-200"></textarea>
        </div>

        <input type="hidden" name="user_id" value="1">

        <button type="submit"
            class="w-full bg-fuchsia-600 text-white px-4 py-2 rounded-md hover:bg-fuchsia-700 transition-colors">
            Créer une nouvelle tâche
        </button>
    </form>
</div>
@endsection
