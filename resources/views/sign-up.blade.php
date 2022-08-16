@extends("layouts/layout")

@section("head_additions")
    <script src="{{ mix('js/check-sign-up.js') }}" defer></script>
@endsection

@section("nav_items")
    <li class="nav-item">
        <a href="/log-in" class="nav-link">Log-in</a>
    </li>
@endsection

@section("main")
    <section class=" text-dark text-left py-3">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-center">
                <div class="border border-secondary p-5">
                    <form id="myform" action="/sign-up" method="POST">
                        @csrf
                        <div class="h1">Sign-Up</div> 
                        <hr>

                        <label class="form-label lead" for="user">User (Account) </label>
                        <input class="form-control mb-3" type="text" name="user" id="user">

                        <label class="form-label lead" for="name">Name</label>
                        <input class="form-control mb-3" type="name" name="name" id="name">

                        <label class="form-label lead" for="email">E-mail</label>
                        <input class="form-control mb-3" type="email" name="email" id="email">

                        <label class="form-label lead" for="password">Password</label>
                        <input class="form-control mb-3" type="password" name="password" id="password">

                        <label class="form-label lead" for="password-again">Confirm the Password</label>
                        <input class="form-control mb-3" type="password" name="password_again" id="password_again">

                        <input class="btn btn-success mt-3" type="submit" value="Sign-up" name="sign_up" id="sign_up">
                    </form>
                </div>
            </div>


            <div class="show_submit_message">
                <span>
                    {{$warning_message}}
                </span>
            </div>
        </div>
    </section>
@endsection





