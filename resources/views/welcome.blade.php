@extends('template')
@section('content')
    {{--скрипт вытягивающий информацию из формы если она не пустая и отправляющий ее на сервер--}}
    <script>
        {{--скрипт вытягивающий информацию из формы если она не пустая и отправляющий ее на сервер--}}
        function addPost(){
            let input = document.getElementById("addPost_input");
            let file = document.getElementById("file_post");

            if(input.value == '' && file.value == ''){
                alert("Вы ничего не написали");
            }else{
                let token = document.querySelector('input[name="_token"]').value
                let formData = new FormData(addPost_form);
                formData.append('_token', token);
                fetch('/addPost', {
                    method: "post",
                    body: formData
                }).then(response=>response.json())
                    .then(result=>{
                        if(result.result === "success"){
                            location.reload();
                        }else{
                            alert("Ошибка");
                            input.value = '';
                        }
                    })

            }
        }
    </script>
        <!-- Container START -->
        <div class="container">
            <div class="row g-4">

                <!-- Sidenav START -->
                <div class="col-lg-3">
                </div>
                <!-- Sidenav END -->

                <!-- Main content START -->
                <div class="col-md-8 col-lg-6 vstack gap-4">


                    <!-- Добавление поста -->
                    <div class="card card-body">
                        <div class="d-flex mb-3">
                            <div class="avatar avatar-xs me-2">
                                <a href="/profile"> <img class="avatar-img rounded-circle" src="{{auth()->user()->img}}"> </a>
                            </div>
                            <form class="w-100">
                                <input class="form-control pe-4 border-0" placeholder="Что у вас нового?" data-bs-toggle="modal" data-bs-target="#modalCreateFeed">
                            </form>
                        </div>
                    </div>
                    <!-- Добавление поста конец -->
                    <!-- Добавление поста окно -->
                    <div class="modal fade" id="modalCreateFeed" tabindex="-1" aria-labelledby="modalLabelCreateFeed" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabelCreateFeed">Добавить запись</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex mb-3">
                                        <div class="avatar avatar-xs me-2">
                                            <img class="avatar-img rounded-circle" src="{{auth()->user()->img}}" alt="">
                                        </div>
                                        <form id="addPost_form" enctype="multipart/form-data" class="w-100 " novalidate>
                                            <textarea name="post_content" id="addPost_input" class="form-control pe-4 fs-3 lh-1 border-0" rows="4" placeholder="Что у вас нового?" autofocus></textarea>
                                            <input id="file_post" name="file" type="file">
                                            <input type="button" id="addPost_button" onclick="addPost()" aria-label="Close" data-bs-dismiss="modal" class="btn btn-success-soft" value="Опубликовать">
                                        </form>
                                    </div>
                                    <div class="hstack gap-2">
                                        <label for="file_post" class="btn icon-md bg-success bg-opacity-10 text-success rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Photo" >
                                            <i class="bi bi-image-fill"></i>
                                        </label>
                                    </div>

                                </div>

                                <div class="modal-footer row justify-content-between">
                                    <div class="col-lg-8 align-self-end">
                                        <label for="addPost_button" aria-label="Close" data-bs-dismiss="modal" class="btn btn-success-soft">Опубликовать</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Добавление конца окно конец -->

                    <!-- Card feed item START -->
                    @foreach($posts as $post)
                        <div class="card mb-3">
                            <!-- Card header START -->
                            <div class="card-header border-0 pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <!-- Avatar -->
                                        <div class="avatar me-2">
                                            <a href="/profile/{id}"> <img class="avatar-img rounded-circle" src="{{auth()->user()->img}}" alt=""> </a>
                                        </div>
                                        <!-- Info -->
                                        <div>
                                            <div class="nav nav-divider">
                                                <h6 class="nav-item card-title mb-0"> <a href="/profile/{id}">{{auth()->user()->name.' '.auth()->user()->lastname}} </a></h6>
                                                <span class="nav-item small">{{Carbon\Carbon::parse($post->created_at)->translatedFormat('d  F  H:i') }}</span>
                                            </div>
                                            <p class="mb-0 small">{{auth()->user()->about}}</p>
                                        </div>
                                    </div>
                                    <!-- Card feed action dropdown START -->
                                    <div class="dropdown">
                                        <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <!-- Card feed action dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction1">
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
                                        </ul>
                                    </div>
                                    <!-- Card feed action dropdown END -->
                                </div>
                            </div>

                            <!-- Card header END -->
                            <!-- Card body START -->
                            <div class="card-body ">
                                <p>{{$post->content}}</p>
                                <!-- Card img -->
                                <img class="card-img" style="width: 100%;" src="{{$post->img}}" alt="">
                                <!-- Feed react START -->
                                <!-- Card share action dropdown menu -->
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction8">
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                                </ul>
                                <!-- Card share action END -->
                                <!-- Feed react END -->
                                <!-- Card body END -->
                            </div>
                        </div>
                    @endforeach
                    <!-- Load more button START -->
                    <a href="#!" role="button" class="btn btn-loader btn-primary-soft" data-bs-toggle="button" aria-pressed="true">
                        <span class="load-text"> Load more </span>
                        <div class="load-icon">
                            <div class="spinner-grow spinner-grow-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </a>
                    <!-- Load more button END -->

                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-lg-3">
                </div>
                <!-- Right sidebar END -->

            </div> <!-- Row END -->
        </div>
        <!-- Container END -->

@endsection
