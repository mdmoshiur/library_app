<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>authors</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            #customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    
    <body>
        <div>
            <a href="create_author">Add New Author</a> &nbsp &nbsp <a href="show_authors">Show All Authors</a> <br> <br> 
            <a href="add_book">Add New Book</a> &nbsp &nbsp <a href="show_books">Show All Books</a> <br> <br>
        </div>
        <div>
        <form method="post" action="search_author">
                @csrf
                <label for="author_name">Search Author:</label><br>
                <input type="text" name="author_name" placeholder="Search here.." required><br><br>
                <input type="submit" name="submit" value="Submit"> 
            </form>
        <br> <br>
        </div>
        <div>
            <table id="customers">
                <tr>
                    <th> Author Name </th>
                    <th> Author Email </th>
                    <th> Author Address </th>
                    <th>Author Books</th>
                    <th> Action</th>
                </tr>
                @foreach($authorArr as $author)
                    <tr>
                        <td> {{$author->name}}</td>
                        <td> {{$author->email}}</td>
                        <td> {{$author->address}}</td>
                        <td>
                            @foreach($author->books as $book)
                            <ul>
                                <li>{{$book->title}}</li>
                            </ul>
                            @endforeach
                        </td>
                        <td> 
                            <a href="edit_author/{{$author->id}}"> Edit </a> &nbsp 
                            <a href="delete_author/{{$author->id}}"> Delete</a>  
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </body>

</html>
