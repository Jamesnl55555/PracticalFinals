<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    dashboard
    <h1>Welcome, {{ Auth::user()->fname }} {{ Auth::user()->lname }}</h1>
    <a href="/logout">Logout</a>
    @foreach($notes as $note)
        <div>
            <h2>{{ $note->title }}</h2>
            <p>{{ $note->body }}</p>
            <p>Created at: {{ $note->created_at }}</p>
        </div>
        <div>
           <a href="{{ route('nedit', $note->id) }}">Edit</a>
        </div>
        <div>
            <a href="{{ route('nview', $note->id) }}">View</a>
        </div>
        <div>
            <form action="{{ route('ndelete', $note->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
    <a href="{{ route('ncreate') }}">Create New Note</a>

</body>
</html>