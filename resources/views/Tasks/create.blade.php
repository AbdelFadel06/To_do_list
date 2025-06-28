<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do-List</title>
</head>
<body>
    <form action="  {{ route('tasks.store') }} " method="POST">

        @csrf

        <input type="text" name="title" placeholder="Title"> 

        <textarea name="description" placeholder="Description"></textarea> 

        <input type="hidden" name="user_id" value='1'>


        <button type="submit">Creer une nouvelle tache</button>

    </form>
</body>
</html>