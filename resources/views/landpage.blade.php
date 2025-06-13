<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background: linear-gradient(135deg, #232526 0%, #0f2027 100%);
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .hello-world {
            color: #fff;
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 2rem;
            letter-spacing: 2px;
        }
        .login-btn {
            display: inline-block;
            padding: 1rem 2.5rem;
            background: #27ae60;
            color: #fff;
            border: none;
            border-radius: 45px;
            font-size: 1.2rem;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 4px 14px rgba(39, 174, 96, 0.2);
            transition: background 0.2s;
        }
        .login-btn:hover {
            background: #219150;
        }
    </style>
</head>
<body>
    
    <div class="hello-world">Hello World!</div>
    <a href='/loginpage' class="login-btn">Login</a>

</body>
</html>