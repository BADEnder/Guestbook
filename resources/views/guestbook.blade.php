@extends("layouts/layout")

@section("head_additions")
    <script src="{{ mix('js/app-vue.js') }}" defer></script>
@endsection

@section("nav_items")
    <li class="nav-item">
        <a href="#show-pages" class="nav-link"> Change Page</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/count-num">How much</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/information">Information</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/log-out">Log-out</a>
    </li>
@endsection

@section("main")
    
<section class="bg-dark text-light text-center py-5">
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div>
                <h1>Be a <span class="text-success"> good person</span></h1>
                <p class="lead my-4"> Just leave a message, if you want to show something now.</p>
                <button class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#submit_new_message">
                    Click me to leave a message
                </button>
            </div>
            <img src="img/showcase.svg" alt="" class="img-fluid w-50 d-none d-md-block">
        </div>

    </div>
</section>

<section class="p-5 m-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6" v-for="(data, idx) in datas" >
                <div class="card bg-secondary text-light p-3 overflow-auto" style="height:800px;">
                    <div class="card-title"> <span class="h5 text-warning"> Article ID: </span> @{{data.id}} </div>
                    <hr>
                    <div class="card-title"> <span class="h5 text-warning"> Title: </span> @{{data.title}}</div>
                    <hr>
                    <div class="card-title"> <span class="h5 text-warning"> Name: </span> @{{data.name}}</div>
                    <hr>
                    <div class="card-title"> <span class="h5 text-warning"> Time: </span> @{{data.updated_at}}</div>
                    <hr>
                    <div class="card-title text-warning lead" > Message: </div>
                    <div class="card-text mb-5" style="white-space:pre; ">@{{data.content}}</div>

                    <hr>


                    <div style="height:400px" class="overflow-auto">
                        <h2> Discussions: </h2>
                        <button @click="get_reply_target(data.id)" class="btn btn-primary btn-md m-1" data-bs-toggle="modal" data-bs-target="#submit_reply_message">
                            Discuss
                        </button>

                        <div class="bg-dark p-2 my-3 me-3" style="border-radius:5px; display:block;  " v-for="(data2, idx2) in datas[idx].reply_data">
                            <div class="card bg-dark text-light p-2">
                                <div class="card-title"> <span class="h5 text-warning"> Name: </span> @{{data2.name}} </div>
                                <hr>
                                <div class="card-title"> <span class="h5 text-warning"> Time: </span> @{{data2.updated_at}}</div>
                                <hr>
                                <div class="card-title text-warning lead" style="white-space:pre;"> Message: </div>
                                <div class="card-text mb-5">@{{data2.content}}</div>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-secondary p-5" >
<div class="container ">
    <div class="d-sm-flex align-items-center justify-content-around">
        <button @click="go_previous_page" id="p_page_but" class="btn btn-dark btn-lg"> &lt; </button>
        <div class="h3" id="show-pages"> Pages(@{{cur_page}}/@{{total_page}}) </div>
        <button @click="go_next_page" id="n_page_but" class="btn btn-dark btn-lg"> &gt; </button>
    </div>
</div>
</section>


<div class="show_submit_message">
    <span>
        Submit Success !!
    </span>
</div>

<footer class="py-4 bg-dark position-relative">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center">
            <span class="text-white text-center"> Copyright &copy; 2022</span>
        </div>
    </div>
</footer>


{{-- modal part --}}

{{-- New Message for guestbook --}}
<section>
    <div class="modal fade text-dark" id="submit_new_message" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Leave a new Message</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="lead"> Show me something no matter what it is.</p>
                    <div class="mb-3" >
                        <input id="message_id" type="text" value="{{$auth_id}}" hidden>
                        <label for="message_name" class="col-form-label">Name</label>
                        <input id="message_name" type="text" class="form-control" value="{{$auth_name}}" readonly>

                        <label for="message_title" class="col-form-label">Title</label>
                        <input id="message_title" type="text" class="form-control">

                        <label for="message_content" class="col-form-label">Message</label>
                        <textarea id="message_content" class="form-control" style="height:200px"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="submit_new_message_fun()" data-bs-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>    
</section>

{{-- Reply for certain message --}}
<section>
    <div class="modal fade text-dark" id="submit_reply_message" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Reply for the article</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <h5>Article ID</h5>
                        <input id="reply_article_id" type="text" name="id" :value="reply_target" class="form-control" readonly>

                        <label for="reply_user_name" class="col-form-label">Name</label>
                        <input id="reply_user_name" type="text" name="name" class="form-control" value="{{$auth_name}}" readonly>

                        <label for="reply_content" class="col-form-label">Message</label>
                        <textarea id="reply_content" name="content" class="form-control" style="height:200px"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="submit_reply_fun()" data-bs-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <span id="get_api_token" style="display:none">
    {{$auth_api_token}}
</span> --}}



        
@endsection

