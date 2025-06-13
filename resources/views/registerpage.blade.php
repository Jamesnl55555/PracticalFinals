<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" name="uname" placeholder="Enter your Username" required>
        <input type="text" name="fname" placeholder="Enter your First Name" required>
        <input type="text" name="lname" placeholder="Enter your Last Name" required>
        <input type="email" name="email" placeholder="Enter your email" required>
        @if ($errors->has('email'))
            <div style="color: red;">{{ $errors->first('email') }}</div>
        @endif
        <input type="password" name="password" placeholder="Enter your password" required>
        <input type="password" name="cpassword" placeholder="Confirm your password" required>
         @if ($errors->has('password'))
            <div style="color: red;">{{ $errors->first('password') }}</div>
        @endif
        <button type="submit">Submit</button>
    </form>
    <p>Already have an account?</p> <a href="{{ route('loginpage') }}">Login Now!</a>
    
</body>
</html>