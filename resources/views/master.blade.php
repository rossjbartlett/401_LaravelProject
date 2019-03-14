<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link href="/css/app.css" rel="stylesheet">
    <script>
        function imgError(image) {
        image.onerror = "";
        image.src = "https://cdn2.iconfinder.com/data/icons/image-1/64/Image-12-512.png";
        image.style.width = "10%";
        image.style.height = "75px";
        return true;
        }
    </script>
</head>

<body>
    <div class='container'>
        @yield('content')
    </div>

    <div class='container'>
        @yield('footer')
    </div></body>

</html>