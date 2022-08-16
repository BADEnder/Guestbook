@extends("layouts/layout")

@section("head_additions")
    <script src="{{ mix('js/information.js') }}" defer></script>
@endsection

@section("nav_items")
    <li class="nav-item">
        <a href="/" class="nav-link">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/count-num">How much</a>
    </li>
    <li class="nav-item">
        <a href="/log-out" class="nav-link">Log-out</a>
    </li>
@endsection

@section("main")
    <section class=" text-dark text-left py-3">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-center">
                <div class="border border-secondary p-5">
                    <form id="myform" action="/information" method="POST">
                        @csrf
                        <h1>Information</h1><hr>
                        
                        <label class="form-label lead" for="user">User</label>
                        <input class="form-control mb-3" type="text" name="user" id="user" value="{{$auth_user}}" readonly>
                        
                        <label class="form-label lead" for="name">Name</label>
                        <input class="form-control mb-3" type="name" name="name" id="name" value="{{$auth_name}}">
                        
                        
                        <label class="form-label lead" for="email">E-mail</label>
                        <input class="form-control mb-3" type="email" name="email" id="email" value="{{$auth_email}}">
                        
                        <label class="form-label lead" for="password">Password</label>
                        <input class="form-control mb-3" type="password" name="password" id="password" >
                        
                        <label class="form-label lead" for="password-again">Confirm Password</label>
                        <input class="form-control mb-3" type="password" name="password_again" id="password_again" >


                        <input class="btn btn-primary mt-3" type="submit" value="Change" name="change" id="change">
                        
                    </form>
                </div>
            </div>

            <div class="h5 text-danger text-center mt-3"> {{$warning_message}}</div>
        </div>
    </section>
@endsection





        
        




