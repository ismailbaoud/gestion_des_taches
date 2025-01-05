<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .fade-in {
            animation: fadeIn 1s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body class="flex items-center justify-center h-screen bg-cover bg-center"
    style="background-image: url('https://source.unsplash.com/1600x900/?nature,water');">
    <div class="text-center bg-white bg-opacity-80 rounded-lg p-10 shadow-lg">
        <h1 class="text-8xl font-bold text-red-600 animate-bounce">404</h1>
        <p class="mt-4 text-3xl text-gray-800">Oops! Page not found.</p>
        <p class="mt-2 text-gray-600">The page you are looking for does not exist.</p>

        <a href="/"
            class="mt-6 inline-block px-6 py-3 text-white bg-blue-600 rounded hover:bg-blue-700 transition duration-300">Go
            to Homepage</a>
    </div>
</body>

</html>