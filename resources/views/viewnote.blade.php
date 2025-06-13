<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body> 
    <nav class="bg-black p-4">
    <div class="container mx-auto flex flex-col lg:flex-row justify-between items-center">
        <div class="text-white font-bold text-3xl mb-4 lg:mb-0 hover:text-orange-600 hover:cursor-pointer">
        <a href="/dashboard">Dashboard</a>
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
        <div class="mx-14 mt-10 border-2 border-blue-400 rounded-lg">
        <div class="mt-3 text-center text-4xl font-bold">Viewing note</div>
        <form action="{{ route('ndelete', $note->id) }}" method="POST" class="inline-block ml-9">
            <div class="flex justify-center mt-4">
            @csrf
            @method('DELETE')
            <div class="w-full flex justify-center">
                <button type="submit" class="cursor-pointer rounded-lg bg-blue-700 px-8 py-2 text-sm font-semibold text-white">Delete</button>
            </div>
        </div>
        </form>
        <div class="p-8">
            <div class="flex gap-4">
            <itextarea name="title" class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"/>{{ $note->title }}</textarea>
            </div>
            <div class="">
            <textarea id="text" cols="30" rows="10" class="mb-10 h-40 w-full resize-none rounded-md border border-slate-300 p-5 font-semibold text-gray-300">{{ $note->body }} </textarea>
            </div>
            <div class="text-center">
            <a href="{{ route('nedit', $note->id) }}" class="cursor-pointer rounded-lg bg-blue-700 px-8 py-5 text-sm font-semibold text-white">Edit note</a>
            </div>
            </div>
            </div>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>