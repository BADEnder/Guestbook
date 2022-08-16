@extends("layouts/layout")

@section("head_additions")
    <script src="{{ mix('js/counting-num.js') }}" defer></script>

@endsection

@section("nav_items")
    <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/information">Information</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/log-out">Log-out</a>
    </li>
@endsection

@section("main")
    <section class=" text-dark text-left py-5 my-3">
        <div class="container">

            <div class="d-lg-flex align-items-center justify-content-between">
                <div class="border border-secondary p-5 ">
                        <div class="h1"> Determine The Date </div><hr>
                        <label class="form-label lead" for="begin">From</label>
                        <input class="form-control mb-3" type="date" name="beginning_date" id="begin">

                        <label class="form-label lead" for="end">To</label>
                        <input class="form-control mb-3" type="date" name="endding_date" id="end">
                        
                        <input class="btn btn-primary mb-3" type="submit" value="Check" name="check" onclick="check_fun()">

                    </div>
                        <div class="counting_num_graph bg-secondary 
                        border border-dark p-2 my-3 d-flex align-items-center justify-content-center" 
                        style="height:500px" >
                        <div id="graph"></div>
                    </div>
                </div>


                
        </div>
    </section>

    {{-- <span id="get_api_token" style="display:none">
        {{$auth_api_token}}
    </span> --}}
    
@endsection