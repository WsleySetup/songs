<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <grid>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('albums.store') }}" method="POST">
    @csrf
    <label for="name">Album Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="year">Release Year:</label>
    <input type="number" id="year" name="year" required>

    <label for="times_sold">Times Sold:</label>
    <input type="number" id="times_sold" name="times_sold" required>

    <label for="band_id">Select Band:</label>
    <select id="band_id" name="band_id" required>
        <option value="">-- Select a Band --</option>
        @foreach($bands as $band)
            <option value="{{ $band->id }}">{{ $band->name }}</option>
        @endforeach
    </select>

    <button type="submit">Create Album</button>
</form>

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
            width: 50%;
            text-align: center;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            margin-top: 10px;
            border-radius: 4px;
        }
        button
        {
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
        </grid>
</body>
</html>
