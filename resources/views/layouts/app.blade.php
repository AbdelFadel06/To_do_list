<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do List</title>
    @vite('resources/css/app.css')
    
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="container p-4 max-w-4xl mx-auto">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
