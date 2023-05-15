<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>a</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Sauna Name</h1>
        <div class='saunas'>
            @foreach ($saunas as $sauna)
                <div class='sauna'>
                    <h2 class='title'>{{ $sauna->title }}</h2>
                    <p class='body'>{{ $sauna->body }}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>