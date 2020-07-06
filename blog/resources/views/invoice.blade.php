<!DOCTYPE html>
<html>
<head>
    <title>Convert to pdf</title>
    <style type="text/css">
        table{
            width: 70%;
            margin: 0 auto;
            border: 1px solid;
        }

    </style>
</head>
<body>

<table>
    <caption><h1>Notes</h1></caption>
    <thead>
    <tr>
         <th>title</th>
         <th>body</th>
    </tr>
    </thead>
    <tbody>
    @foreach($notes as $key => $note)
         <tr>
             <td>{{$note->title}}</td>
             <td>{{$note->body}}</td>
         </tr>
      @endforeach
    </tbody>
</table>
</body>
</html>