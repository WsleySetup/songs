<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>songs</title>
    <style>
        body {
            background-color: wheat;
            font-family: Arial, sans-serif;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 0px;
            padding: 20px;
        }

        h3, button, form {
            margin: 0;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        .grid-item {
            padding: 10px;
            background-color: wheat;
            border-radius: 8px;
        }

        button a {
            text-decoration: none;
        }

        /* Make buttons and layout responsive */
        a {
            display: block;
            width: 20%;
            text-align: center;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            margin-top: 10px;
            border-radius: 4px;
        }

        button {
            display: block;
            width: 20%;
            text-align: center;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            margin-top: 10px;
            border-radius: 0px;
            font-size: 20px;
        }

        button a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <grid>
        <h2>List of songs</h2>
        <div class="grid-container">
            <ul>
                @foreach ($songs as $song)
                <div class="grid-item">
                    <h3>
                        <a href="{{ route('songs.show', $song->id) }}">{{ $song->title }}</a>
                        @if(Auth::check())
                            - <a href="{{ route('songs.edit', $song->id) }}">Edit</a>
                            <form action="{{ route('songs.destroy', $song->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this song?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endif
                    </h3>
                </div>
                @endforeach
            </ul>
        </div>

        @if(Auth::check())
            <button>
                <a href="songs/create">Create</a>
            </button>
        @endif

        <button>
            <a href="albums">Albums</a>
        </button>
        <button>
            <a href="bands">Bands</a>
        </button>
        <button>
            <a href="dashboard">Dashboard</a>
        </button>
    </grid>
</body>
</html>