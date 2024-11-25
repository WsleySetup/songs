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
    <h2>Viewing the song:<h2>
    <h3>In album: {{ $album->name}}</h3> <br>
    <h3>{{ $song->title  }} by {{ $song->singer  }}<h3>

        <form action="/songs">
            <input type="submit" value="back" />
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
                width: 30%;
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

