<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do-List</title>
</head>
<body>
    <div>
        <h1>
            To Do List
        </h1>

        <div>

            <a href=" {{ route('tasks.create') }}  "> Creer </a>

           
                    <a href=" {{ route('tasks.index') }} "> All tasks</a>
                
                
                    <a href=" {{ route('tasks.completed') }} "> 
                       Completed tasks 
                    </a>
                
                
                    <a href=" {{ route('tasks.pending') }} "> Pending tasks</a>
               
            </select>

        </div>

        @foreach ( $tasks as $task)
            <h6>
                {{ $task->title }}
            </h6> 

            <p>
                {{ $task->description }}
            </p> 

            <form action=" {{ route('tasks.toogle', $task->id) }} " method="POST">

                @csrf
                @method('PATCH')

                <button>
                    {{ $task->isDone ? 'Marquer comme non fait' : 'Marquer comme fait' }}
                </button>

            </form>


            <div>
                <form action="  {{ route('tasks.destroy', $task->id) }} " method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Supprimer</button>

                </form>

                <a href="  {{ route('tasks.edit', $task) }} "> Modifier</a>
            </div>

        @endforeach
    </div>
</body>
</html>