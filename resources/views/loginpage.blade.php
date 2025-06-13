<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-gray-500 text-gray-800 dark:text-gray-200 flex items-center justify-center min-h-screen">
    <div class="flex justify-center">
  <div class="w-96 backdrop-blur-lg bg-opacity-80 rounded-lg shadow-lg p-5 bg-gray-900 text-white">
    <h2 class="text-2xl font-bold pb-5">Sign In</h2>
     @error('login')
         <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
      <div class="mb-4">
        <label for="email" class="block mb-2 text-sm font-medium">Your email</label>
        <input
          type="email"
          id="email"
          class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
          placeholder="andrew@mail.com"
          name="email"
          required
          value=""
        >
      </div>
      <div class="mb-4">
        <label for="password" class="block mb-2 text-sm font-medium">Your password</label>
        <input
          type="password"
          id="password"
          class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
          placeholder="*********"
          name="password"
          required
          value=""
        >
      </div>
      <div class="flex items-center justify-between mb-4">
        <button
          type="submit"
          class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 px-5 w-full sm:w-auto"
        >
          Submit
        </button>
        
        <div class="flex items-center text-sm">
          <p>New here?</p>
          <a href="regpage"><p class="underline cursor-pointer ml-1">Register</p></a>
        
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>