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
            <h2>Create new book</h2>

            <form method="post" action="{{route('update_book', [$bookArr->id])}}">
                @csrf
                <label for="title">Book Title:</label><br>
                <input type="text" name="title" value="{{$bookArr->title}}" required><br><br>
                <label for="email">Subject:</label><br>
                <input type="text" name="subject" value="{{$bookArr->subject}}" required><br><br>
                <label for="address">Book Authors IDs(comma separated ids):</label><br>
                <input type="text" name="authors" value=""  required><br><br>
                <input type="submit" name="submit" value="Submit">
                
            </form> 
        </div>
    </body>

</html>
