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
    <h2 class="text-2xl font-bold pb-5">Register</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-4">
        <label for="uname" class="block mb-2 text-sm font-medium">Enter username</label>
        <input
          type="text"
          id="uname"
          class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
          placeholder="James"
          name="uname"
          required
        >
      </div>
      <div class="mb-4">
        <label for="fname" class="block mb-2 text-sm font-medium">Enter your first name</label>
        <input
          type="text"
          id="fname"
          class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
          placeholder="James"
          name="fname"
          required
    
        >
      </div>
      <div class="mb-4">
        <label for="lname" class="block mb-2 text-sm font-medium">Enter your last name</label>
        <input
          type="text"
          id="lname"
          class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
          placeholder="Bonding"
          name="lname"
          required
    

        >
      </div>
      <div class="mb-4">
        <label for="email" class="block mb-2 text-sm font-medium">Your email</label>
        <input
          type="email"
          id="email"
          class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
          placeholder="andrew@mail.com"
          name="email"
          required
        >
        @if ($errors->has('email'))
            <div style="color: red;">{{ $errors->first('email') }}</div>
        @endif
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
        >
      </div>
      <div class="mb-4">
        <label for="cpassword" class="block mb-2 text-sm font-medium">Confirm password</label>
        <input
          type="password"
          id="cpassword"
          class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
          placeholder="*********"
          name="cpassword"
          required
        >
           @if ($errors->has('password'))
            <dilv style="color: red;">{{ $errors-o>first('password') }}</div>
        @endif
      </div>
      <div class="flex items-center ijustify-between nmb-4">
        <button
          type="submit"
          class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-2 focus:ring-blue-300 font-medium r[ounded-lg text-sam py-2.5 px-5 w-gfull sm:w-auto"e
        >
          Submit
        </button>
        <div class="flex items-center text-sm">
          <p>already had an account?</p>
          <a href="/loginpage"><p class="underline cursor-pointer ml-1">Log in</p></a>
        </div>
      </div>
    </form>
  </div>
</div>
    
</body>
</html>