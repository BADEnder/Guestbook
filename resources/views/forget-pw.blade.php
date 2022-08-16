@extends("layouts/layout")


@section("nav_items")
    <li class="nav-item">
        <a href="/log-in" class="nav-link">Log-in</a>
    </li>
    <li class="nav-item">
        <a href="/sign-up" class="nav-link">Sign-Up</a>
    </li>
@endsection

@section("main")
    <section class=" text-dark text-left py-3">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-center">
                <div class="border border-secondary p-5">
                    <form action="/forget-pw" method="POST" class="">
                        @csrf
                        <form action="/forget-pw" method="POST">
                            <h1>Forget password</h1><hr>
                            <label class="form-label lead" for="user">User</label><br>
                            <input class="form-control" type="text" name="user" id="user"><br>

                            <input class="btn btn-warning mt-2" type="submit" value="Send-Email" name="check" id="check">
                            
                        </form>
                    </form>
                </div>
            </div>
            <div class="h5 text-danger text-center mt-3"> {{$warning_message}} </div>
        </div>
    </section>
@endsection








