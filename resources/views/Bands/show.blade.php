<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $bands->name }} - Band Details</title>
</head>
<body>
    <div class="grid-container">
        <h2>Viewing the Band:</h2>
        <h3>
            Name: {{ $bands->name }} <br>
            Genre: {{ $bands->genre }} <br>
            Founded: {{ $bands->founded }} <br>
            Active Till: {{ $bands->active_till }}
        </h3>

        <h3>Albums:</h3>
        @if ($bands->albums->isEmpty())
            <p>No albums found for this band.</p>
        @else
            <ul>
                @foreach ($bands->albums as $album)
                    <li>
                        {{ $album->name }} (Year: {{ $album->year }}, Times Sold: {{ $album->times_sold }})
                        <!-- Optional: Link to view the album -->
                        <a href="{{ route('albums.show', $album->id) }}">View Album</a>
                    </li>
                @endforeach
            </ul>
        @endif

        <form action="/bands">
            <input type="submit" value="Back" />
        </form>
    </div>
    <style>
        body {
            background-color: wheat;
            font-family: Arial, sans-serif;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 1fr;
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

        a {
            display: inline-block;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            margin-top: 10px;
            border-radius: 4px;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</body>
</html>
