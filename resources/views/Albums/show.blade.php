<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $album->name }}</title>
</head>
<body>
    <h2>Viewing the album: {{ $album->name }}</h2>
    <h3>Year: {{ $album->year }}, Times Sold: {{ $album->times_sold }}, Made by: {{ $album->band->name }}</h3>


    <h4>Songs:</h4>
    <ul>
        @foreach($album->songs as $song)
            <li>{{ $song->title }}<a href="{{ route('songs.show', $song->id) }}">View Song</a></li>

        @endforeach
    </ul>

    <form action="/albums">
        <input type="submit" value="back" />
    </form>

    <style>
        body {
            background-color: wheat;
            font-family: Arial, sans-serif;
        }

        a {
            display: inline-block;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            margin-top: 10px;
            border-radius: 4px;
        }
    </style>
</body>
</html>
