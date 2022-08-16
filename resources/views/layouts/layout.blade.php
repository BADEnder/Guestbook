

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>For Better World </title>


    {{-- <link rel="icon" href="logo.ico"> --}}
    
    <link media="all" type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>

    
    @yield("head_additions")
</head>


<body class="bg-light">
    <div id="app" v-cloak>
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
            <div class="container">
                <a href="#" class=" navbar-brand"> Guestbook</a>

                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="nav-menu">
                    <ul class="navbar-nav ">
                        @yield("nav_items")
                    </ul>
                </div>
            </div>
        </nav>

    
        @yield("main")  



    </div>


</body>
<html>
</html>