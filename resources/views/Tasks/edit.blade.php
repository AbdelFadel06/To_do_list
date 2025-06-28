<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do-List</title>
</head>
<body>
    <form action="  {{ route('tasks.update', $task) }} " method="POST">

        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ old('title', $task->title) }}" placeholder="Title"> <br>

        <textarea name="description" placeholder="Description"> {{ old('description', $task->description) }}  </textarea>  <br>

        

        <button type="submit">Creer une nouvelle tache</button>

    </form>
</body>
</html>