<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        body {
            margin: 0;
            padding: 10px 30px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }
        .item {
            margin: 10px 0 18px 0;
        }
        li {
            margin: 10px 0;
        }
        h4, h1 {
            margin: 0;
        } 
        p {
            margin: 7px 0;
        }
        .red {
            color: rgb(218, 47, 47);
        }
    </style>
</head>
<body>

    @yield('content')
    
    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>

</body>
</html>