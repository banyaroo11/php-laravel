<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <ul>
        @foreach ($articles as $article)
            <li>{{ $article['id'] . ' - ' . $article['title'] }}</li>
        @endforeach
    </ul>
</body>

</html>
