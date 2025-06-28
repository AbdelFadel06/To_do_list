@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Modifier la tâche</h2>

    <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-gray-700 font-medium mb-1">Titre</label>
            <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-fuchsia-500 focus:ring focus:ring-fuchsia-200"
                placeholder="Titre">
        </div>

        <div>
            <label for="description" class="block text-gray-700 font-medium mb-1">Description</label>
            <textarea id="description" name="description" rows="4" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-fuchsia-500 focus:ring focus:ring-fuchsia-200"
                placeholder="Description">{{ old('description', $task->description) }}</textarea>
        </div>

        <button type="submit"
            class="w-full bg-fuchsia-600 text-white px-4 py-2 rounded-md hover:bg-fuchsia-700 transition-colors">
            Enregistrer les modifications
        </button>
    </form>
</div>
@endsection
