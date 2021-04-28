<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>create authors</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
    
           
        </style>
    </head>
    
    <body>
        <div style="margin: auto;
            width: 50%;
            padding: 10px;">
            <h2>Create new author</h2>

            <form method="post" action="{{route('update_author', [$authorArr->id])}}">
                @csrf
                <label for="name">Author Name:</label><br>
                <input type="text" name="name" value="{{$authorArr->name}}" required><br><br>
                <label for="email">Author email:</label><br>
                <input type="text" name="email" value="{{$authorArr->email}}" required><br><br>
                <label for="address">Author address:</label><br>
                <input type="text" name="address" value="{{$authorArr->address}}" required><br><br>
                <input type="submit" name="submit" value="Submit">
            </form> 
        </div>
    </body>

</html>
