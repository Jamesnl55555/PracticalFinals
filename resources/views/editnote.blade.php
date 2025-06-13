<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
    <form action="{{ route('nupdate', ['id' => $note->id]) }}" method="POST">
        @csrf
        <input type="text" name="title" value="{{ $note->title }}" required>
        <textarea name="body" required>{{ $note->body }}</textarea>
        <button type="submit">Submit</button>
    </form>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
</body>
</html>