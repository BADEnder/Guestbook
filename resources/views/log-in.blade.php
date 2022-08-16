@extends("layouts/layout")

@section("head_additions")
    <script src="{{ mix('js/check-log-in.js') }}" defer></script>
@endsection

@section("nav_items")
        <li class="nav-item">
        <a href="/sign-up" class="nav-link">Sign up</a>
    </li>
    <li class="nav-item">
        <a href="/forget-pw" class="nav-link">Forget Password</a>
    </li>
@endsection

@section("main")
    <section class=" text-dark text-left py-3">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-center">
                <div class="border border-secondary p-5">
                    <form action="/log-in" method="POST" class="">
                        @csrf
                        <div class="h1"> Log-in </div><hr>
                        <label class="form-label lead" for="user">User</label>
                        <input class="form-control mb-3" type="text" name="user" id="user">

                        <label class="form-label lead" for="password">Password</label>
                        <input class="form-control mb-3" type="password" name="password" id="password">
                        
                        <input class="btn btn-primary mb-3" type="submit" value="Log-in" name="log_in">
                        <div class="">
                            <label class="lead" for="remember_me">Remember Me</label>
                            <input class="mx-2" type="checkbox" name="remember_me" id="remember_me">
                        </div>
                        
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



