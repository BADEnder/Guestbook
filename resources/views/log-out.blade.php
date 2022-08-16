@extends("layouts/layout")

@section("main")


        <div>
            <br>
            <br>
            <h1 style="text-align:center;"> Log-out Success! </h1><br>
            <h3 style="text-align:center"> (Waiting 5 seconds) </h3>
        </div>

    <script>
        setTimeout(()=>{
            window.location.href="/log-in"
        }, 3000)
    </script>
@endsection


