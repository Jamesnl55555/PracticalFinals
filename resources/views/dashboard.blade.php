<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <nav class="bg-black p-4">
    <div class="container mx-auto flex flex-col lg:flex-row justify-between items-center">
        <div class="text-white font-bold text-3xl mb-4 lg:mb-0 hover:text-orange-600 hover:cursor-pointer">
        Dashboard
        </div>
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="text-white focus:outline-none flex items-center">

                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <span class="ml-2">here</span>
            </button>
            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg z-50 py-2 px-2">
                @foreach($notes as $note)
                <a href="{{ route('nview', $note->id) }}" class="block px-3 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 truncate" style="max-width: 100%;">
                    {{ $note->title }}
                </a>
                @endforeach
                <hr>
                <a href="{{ route('ncreate') }}" class="block px-3 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 truncate" style="max-width: 100%;">Create New Note</a>
            </div>
        </div>
        <script src="//unpkg.com/alpinejs" defer></script>
        <div class="lg:flex flex-col lg:flex-row lg:space-x-4 lg:mt-0 mt-4 flex flex-col items-center text-xl">
            <a href="/dashboard" class="text-white  px-4 py-2  hover:text-orange-600">
                Welcome, {{ Auth::user()->fname }} {{ Auth::user()->lname }}
            </a>
            <a href="/logout" class="text-white  px-4 py-2  hover:text-orange-600">Logout</a>
        </div>
    </div>

</nav>
    @foreach($notes as $note)
    <div class="flex flex-wrap flex-row mt-10">
    <div class="p-4 max-w-sm">
        <div class="flex rounded-lg h-full dark:bg-gray-800 bg-teal-400 p-8 flex-col">
            <div class="flex items-center mb-3">
                <h2 class="text-white dark:text-white text-lg font-medium truncate max-w-xs">
                    <a href="{{ route('nview', $note->id) }}">{{ $note->title }}</a>
                </h2>
            </div>
            <div class="flex flex-col justify-between flex-grow">
                <p class="leading-relaxed text-base text-white dark:text-gray-300 overflow-hidden text-ellipsis max-h-24" style="display: -webkit-box; -webkit-box-orient: vertical;">
                    {{ $note->body }}
                    <hr/>    
                    Created at: {{ $note->created_at }}
                </p>
                <a href="{{ route('nedit', $note->id) }}" class="mt-3 text-black dark:text-white hover:text-blue-600 inline-flex items-center">
                    Edit
                </a>
                <form action="{{ route('ndelete', $note->id) }}" method="POST" class="mt-3 text-black dark:text-white hover:text-blue-600 inline-flex items-center">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

</body>
</html>