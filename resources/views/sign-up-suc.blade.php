@extends("layouts/layout")




@section("nav_items")

@endsection

@section("main")
    <div>
        <div>
            <br>
            <br>
            <h1 style="text-align:center;"> Sign-Up Success! </h1><br>
            <h3 style="text-align:center"> (Waiting 5 seconds) </h3>
        </div>
    </div>
    <script>
        setTimeout(()=>{
            window.location.href="/log-in"
        }, 3000)
    </script>
@endsection






