<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset("image/fav-icon.png") }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    {{-- @vite("resources/css/app.css") --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'navy': '#001953',
                        'hijau': '#4CAF50',
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>@yield('title', 'Liturtara')</title>
</head>

<body>
    @yield('content')
</body>
</html>
