@extends('template')
@section('content')
    <script>

        // Флаг загрузки данных
        let loading = false;
        let loadedPosts = [];

        // Обработчик скролла
        window.addEventListener('scroll', () => {

            // Высота скролла и страницы
            let scrollPos = window.scrollY;
            let maxHeight = document.body.scrollHeight;

            // Проверка доскроллили ли до конца
            if(scrollPos + window.innerHeight >= maxHeight) {

                // Загрузка выполняется только если флаг false
                if(!loading) {

                    // Вызов функции загрузки
                    loadPosts();

                    // Устанавливаем флаг на время загрузки
                    loading = true;
                }

            }

        });

            document.addEventListener("DOMContentLoaded", function() {

                document.querySelectorAll('input[name="savePostsId"]').forEach(input => {
                    let savedId = input.value;
                    loadedPosts.push(savedId);
                });
        })

       function loadPosts(){
            let token = document.querySelector('input[name="_token"]').value
            let formData = new FormData();
            formData.append('_token', token);
            fetch('/loadPosts', {
                method: "post",
                body: formData
            }).then(response=>response.json())
                .then(result=>{
                    result.forEach(post => {
                        loadedPosts.push(post.id);
                        let user = post.user;
                        let html = `
                        <div class="card mb-3">
                            <!-- Card header START -->
                            <div class="card-header border-0 pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <!-- Avatar -->
                                        <div class="avatar me-2">
                                            <a href="/profile/${post.user_id}"> <img class="avatar-img rounded-circle" src="${user.img}" alt=""> </a>
                                        </div>
                                        <!-- Info -->
                                        <div>
                                            <div class="nav nav-divider">
                                                <h6 class="nav-item card-title mb-0"> <a href="/profile/${post.user_id}">${user.name+' '+user.lastname} </a></h6>
                                                <span class="nav-item small">${post.published_at_formatted}</span>
                                            </div>
                                            <p class="mb-0 small">${user.about}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card header END -->
                            <!-- Card body START -->
                            <div class="card-body ">
                                <p>${post.content}</p>
                                <!-- Card img -->
                                <img class="card-img" style="width: 500px;" src="${post.img}" alt="">
                                <!-- Card body END -->
                            </div>
                        </div>
                                  `;
                        document.getElementById('posts').insertAdjacentHTML('beforeend', html);
                        loading = false;
                    })
                })
           formData.append('loaded', loadedPosts);
           fetch('/loadPosts', {
               method: "post",
               body: formData
               })
           }

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

                    @csrf
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
                    <div class="" id="posts">
                        @foreach($posts as $post)
                        <div class="card mb-3">
                            <!-- Card header START -->
                            <div class="card-header border-0 pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <!-- Avatar -->
                                        <div class="avatar me-2">
                                            <a href="/profile/{{$post->user->id}}"> <img class="avatar-img rounded-circle" src="{{asset($post->user->img)}}" alt=""> </a>
                                        </div>
                                        <!-- Info -->
                                        <div>
                                            <div class="nav nav-divider">
                                                <h6 class="nav-item card-title mb-0"> <a href="/profile/{{$post->user->id}}">{{$post->user->name.' '.$post->user->lastname}} </a></h6>
                                                <span class="nav-item small">{{Carbon\Carbon::parse($post->created_at)->translatedFormat('d  F  H:i') }}</span>
                                            </div>
                                            <p class="mb-0 small">{{$post->user->about}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card header END -->
                            <!-- Card body START -->
                            <div class="card-body ">
                                <p>{{$post->content}}</p>
                                <!-- Card img -->
                                <img class="card-img" style="width: 500px;" src="{{$post->img}}" alt="">
                                <!-- Feed react END -->
                                <!-- Card body END -->
                            </div>
                        </div>
                            <input class="" name="savePostsId" type="hidden" value="{{$post->id}}">
                    @endforeach
                    </div>

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
