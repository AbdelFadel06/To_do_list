    
@extends('layouts.app')

@section('content')

 <div class="container px-8 py-4s">
        <h1 class="text-2xl bg-fuchsia-500 text-white py-4 px-3">
            To Do List
        </h1>

        <div class="flex justify-between bg-fuchsia-300 text-gray-600 px-3 py-3 ">

            <a href=" {{ route('tasks.create') }}  "> Creer </a>

           
            <div class="flex space-x-4">
                <a href=" {{ route('tasks.index') }} "  class="{{ request('completed') === null ? 'text-fuchsia-950' : 'text-gray-600' }}"> All tasks</a>
                
                
                <a href=" {{ route('tasks.index', ['completed' => true]) }} " class="{{ request('completed') ==true ? 'text-fuchsia-950' : 'text-gray-600' }}   "> 
                       Completed tasks 
                </a>
                
                
                <a href=" {{ route('tasks.index', ['completed' => false]) }} " class="{{ request('completed') == false ? 'text-fuchsia-950' : 'text-gray-600' }} "> Pending tasks</a>
            </div>
               
            

        </div>

        <h2 class="text-center font-semibold text-2xl my-3">
                    @if( isset($completed) )
                        {{  $completed ? 'Completed Task' : 'Pending Task'  }}
                    @else
                        All tasks
                    @endif
        </h2>

        {{-- @foreach ( $tasks as $task)
  
            <div class="my-4 rounded-2xl py-4 px-6 inline-flex w-full justify-between bg-fuchsia-200 leading-loose">
                <div class=" w-[70%]">
                    <h6 class=" text-gray-700">
                            <span class="font-medium text-gray-800 underline underline-offset-4">Title:</span> {{ $task->title }}
                    </h6> 

                    <p class="text-gray-600">
                        <span class="font-medium text-gray-800 underline underline-offset-4">Description:</span> {{ $task->description }}
                    </p> 
                </div>

                <form action=" {{ route('tasks.toogle', $task->id) }} " method="POST">

                    @csrf
                    @method('PATCH')

                    <button>
                        {{ $task->isDone ? 'Marquer comme non fait' : 'Marquer comme fait' }}
                    </button>

                </form>


                <div class="inline-flex space-x-3">
                    <form action="  {{ route('tasks.destroy', $task->id) }} " method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>

                        </button>

                    </form>

                    <a href="  {{ route('tasks.edit', $task) }} "> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </a>
                </div>
            </div>

        @endforeach --}}

        @foreach ($tasks as $task)
            <div class="my-4 w-full rounded-xl border border-gray-200 bg-white p-4 shadow-sm flex justify-between items-center">
                
                {{-- Partie gauche : titre et description --}}
                <div class="flex-1 pr-4">
                    <h6 class="font-semibold text-gray-800 mb-1 flex items-center">
                        {{ $task->title }}
                        @if($task->isDone)
                            <span class="ml-2 inline-block rounded-full bg-green-100 text-green-800 text-xs px-2 py-0.5">Fait</span>
                        @else
                            <span class="ml-2 inline-block rounded-full bg-yellow-100 text-yellow-800 text-xs px-2 py-0.5">À faire</span>
                        @endif
                    </h6>
                    <p class="text-gray-600 text-sm">{{ $task->description }}</p>
                </div>

                {{-- Partie droite : actions --}}
                <div class="flex items-center space-x-3">
                    {{-- Toggle done/not done --}}
                    <form action="{{ route('tasks.toogle', $task->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="text-xs text-gray-600 hover:text-gray-800">
                            {{ $task->isDone ? 'Marquer comme non fait' : 'Marquer comme fait' }}
                        </button>
                    </form>

                    {{-- Edit --}}
                    <a href="{{ route('tasks.edit', $task->id) }}" class="text-gray-500 hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </a>

                   
                    {{-- <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-gray-500 hover:text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form> --}}

                    {{-- bouton delete avec SweetAlert --}}
                <button type="button" onclick="confirmDelete({{ $task->id }})" class="text-gray-500 hover:text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </button>

                {{-- formulaire caché, qu’on déclenche en JS --}}
                <form id="delete-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

                <script>
                    function confirmDelete(taskId) {
                        Swal.fire({
                            title: 'Confirmer la suppression',
                            text: "Cette action est irréversible !",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Supprimer',
                            cancelButtonText: 'Annuler'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // on soumet le formulaire
                                document.getElementById('delete-form-' + taskId).submit();
                            }
                        })
                    }
                </script>


                </div>
            </div>
        @endforeach

    </div>


@endsection