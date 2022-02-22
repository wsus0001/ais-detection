<!DOCTYPE html>
<html lang="en">

<head>
    @yield('title')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <style class="background-image">
        body{
            background-image: url("{{asset('black01.jpg')}}");
            background-size: cover;
        }
    </style>
    @yield('head')
</head>

<body>
    <!--Navigation bar-->
        <div class="wrapper">
        
            <div id="content">

                <nav class="navbar fixed-top navbar-dark navbar-expand-lg bg-dark">
                    <h4 class="text-light">CT Scan Preprocessor</h1>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="/"><strong>Home</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="/about_us"><strong>About Us</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="/contact_page"><strong>Contact</strong></a></li>
                    </ul>
                </nav>
                @yield('contents')
            </div>
        </div>
    
    <script src="/js/app.js"></script>
    @yield('script')

</body>

</html>
