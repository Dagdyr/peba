@extends('template')
@section('content')
    <body>

    <!-- =======================
    Header START -->
    <main>


        <!-- Container START -->
        <div class="container">
            <div class="row g-4">

                <!-- Main content START -->
                <div class="col-lg-8 vstack gap-4">
                    <!-- My profile START -->
                    <div class="card">
                        <!-- Cover image -->
                        <div class="h-70px rounded-top"></div>
                        <!-- Card body START -->
                        <div class="card-body py-0">
                            <div class="d-sm-flex align-items-start text-center text-sm-start">
                                <div>
                                    <!-- Avatar -->

                                    <div class="avatar avatar-xxl mt-n5 mb-3">
                                        <img id="user_avatar" class="avatar-img rounded-circle border border-white border-3" src="{{asset($user->img)}}" alt="">
                                    </div>
                                </div>
                                <div class="ms-sm-4 mt-sm-3">
                                    <div class="input-group mb-3 g-1 row">
                                        <!-- Info -->
                                        <div class="col-sm-3">
                                            <input type="text" aria-label="Имя" class="h5 form-control-plaintext" id="userName" readonly value="{{$user->name}}">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" aria-label="Фамилия" class="h5 form-control-plaintext" id="userLastname" readonly value="{{$user->lastname}}">
                                        </div>
                                        <!-- Button -->
                                        <div class="col-5 ms-auto" id="buttonChangeName">
                                            <button class="btn btn-outline-danger" id="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Изменить профиль
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li> <button id="changeName" class="dropdown-item" onclick="changeName()">Изменить имя и фамилию</button></li>
                                                <li><button class="dropdown-item"  type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Изменить изображение профиля</button></li>
                                                <li><button onclick="logout()" class="dropdown-item"  type="button">Выйти</button></li>
                                            </ul>
                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Изменить аватарку</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form id="img_form" enctype="multipart/form-data">
                                                                <input class="form-control" id="img_input" name="img" type="file">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                            <input type="button" id="changeAvatar" onclick="changeImg()" class="btn btn-primary" data-bs-dismiss="modal" value="Сохранить"></form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- My profile END -->
                    @csrf
                    <!-- Добавление поста -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="{{asset($user->img)}}" alt="">
                                </div>
                                <form class="w-100">
                                    <input class="form-control pe-4 border-0" placeholder="Что у вас нового?" data-bs-toggle="modal" data-bs-target="#modalCreateFeed">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Добавление поста конец -->
                    <div class="" id="main_content">
                        @foreach($posts as $post)
                            <div class="card mb-3">
                                <!-- Card header START -->
                                <div class="card-header border-0 pb-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <!-- Avatar -->
                                            <div class="avatar me-2">
                                                <img class="avatar-img rounded-circle" src="{{asset($user->img)}}" alt="">
                                            </div>
                                            <!-- Info -->
                                            <div>
                                                <div class="nav nav-divider">
                                                    <h6 class="nav-item card-title mb-0">{{$user->name.' '.$user->lastname}}</h6>
                                                    <span class="nav-item small">{{Carbon\Carbon::parse($post->created_at)->translatedFormat('d  F  H:i') }}</span>
                                                </div>
                                                <p class="mb-0 small">{{$user->about}}</p>
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
                                    <img class="card-img" style="width: 100%;" src="{{asset($post->img)}}" alt="">
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
                                    </li>
                                    <!-- Card share action END -->
                                    </ul>
                                    <!-- Feed react END -->
                                    <!-- Card body END -->
                                </div>
                            </div>
                        @endforeach
                        <!-- Card feed item START -->
                    </div>
                    <!-- Card feed item START -->

                    <!-- Card feed item END -->
                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-lg-4">

                    <div class="row g-4">

                        <!-- Card START -->
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title">О себе</h5>
                                    <!-- Button modal -->
                                </div>
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <input type="text" id="about"  class="form-control-plaintext" readonly value="{{$user->about}}">
                                    <input id="change_about" onclick="about()" class="btn btn-primary-soft btn-sm col-sm-4" type="button" value="Изменить">
                                    <!-- Date time -->
                                    <ul class="list-unstyled mt-3 mb-0">
                                        <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> Дата рождения: <strong> {{$user->birthday}} </strong> </li>
                                        <li> <i class="bi bi-envelope fa-fw pe-1"></i> Email: <strong> {{$user->email}} </strong> </li>
                                    </ul>
                                </div>
                                <!-- Card body END -->
                            </div>
                        </div>
                        <!-- Card END -->

                        <!-- Card START -->
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <!-- Card START -->
                                <div class="col-md-6 col-lg-12">
                                </div>
                            </div>
                        </div>
                        <!-- Card END -->

                        <!-- Card START -->
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <!-- Card header START -->
                                <div class="card-header d-sm-flex justify-content-between align-items-center border-0">
                                    <h5 class="card-title">Друзья <span class="badge bg-danger bg-opacity-10 text-danger">{{$user->friends_count}}</span></h5>
                                    <a class="btn btn-primary-soft btn-sm" href="/friends"> Показать всех друзей</a>
                                </div>
                                <!-- Card header END -->
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <div class="row g-3">

                                        <div class="col-6">
                                            <!-- Friends item START -->
                                            <div class="card shadow-none text-center h-100">
                                                <!-- Card body -->
                                                <div class="card-body p-2 pb-0">
                                                    <div class="avatar avatar-story avatar-xl">
                                                        <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt=""></a>
                                                    </div>
                                                    <h6 class="card-title mb-1 mt-3"> <a href="#!"> Amanda Reed </a></h6>
                                                    <p class="mb-0 small lh-sm">16 mutual connections</p>
                                                </div>
                                                <!-- Card footer -->
                                                <div class="card-footer p-2 border-0">
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Send message"> <i class="bi bi-chat-left-text"></i> </button>
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove friend"> <i class="bi bi-person-x"></i> </button>
                                                </div>
                                            </div>
                                            <!-- Friends item END -->
                                        </div>

                                        <div class="col-6">
                                            <!-- Friends item START -->
                                            <div class="card shadow-none text-center h-100">
                                                <!-- Card body -->
                                                <div class="card-body p-2 pb-0">
                                                    <div class="avatar avatar-xl">
                                                        <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt=""></a>
                                                    </div>
                                                    <h6 class="card-title mb-1 mt-3"> <a href="#!"> Samuel Bishop </a></h6>
                                                    <p class="mb-0 small lh-sm">22 mutual connections</p>
                                                </div>
                                                <!-- Card footer -->
                                                <div class="card-footer p-2 border-0">
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Send message"> <i class="bi bi-chat-left-text"></i> </button>
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove friend"> <i class="bi bi-person-x"></i> </button>
                                                </div>
                                            </div>
                                            <!-- Friends item END -->
                                        </div>

                                        <div class="col-6">
                                            <!-- Friends item START -->
                                            <div class="card shadow-none text-center h-100">
                                                <!-- Card body -->
                                                <div class="card-body p-2 pb-0">
                                                    <div class="avatar avatar-xl">
                                                        <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt=""></a>
                                                    </div>
                                                    <h6 class="card-title mb-1 mt-3"> <a href="#"> Bryan Knight </a></h6>
                                                    <p class="mb-0 small lh-sm">1 mutual connection</p>
                                                </div>
                                                <!-- Card footer -->
                                                <div class="card-footer p-2 border-0">
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Send message"> <i class="bi bi-chat-left-text"></i> </button>
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove friend"> <i class="bi bi-person-x"></i> </button>
                                                </div>
                                            </div>
                                            <!-- Friends item END -->
                                        </div>

                                        <div class="col-6">
                                            <!-- Friends item START -->
                                            <div class="card shadow-none text-center h-100">
                                                <!-- Card body -->
                                                <div class="card-body p-2 pb-0">
                                                    <div class="avatar avatar-xl">
                                                        <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt=""></a>
                                                    </div>
                                                    <h6 class="card-title mb-1 mt-3"> <a href="#!"> Amanda Reed </a></h6>
                                                    <p class="mb-0 small lh-sm">15 mutual connections</p>
                                                </div>
                                                <!-- Card footer -->
                                                <div class="card-footer p-2 border-0">
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Send message"> <i class="bi bi-chat-left-text"></i> </button>
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove friend"> <i class="bi bi-person-x"></i> </button>
                                                </div>
                                            </div>
                                            <!-- Friends item END -->
                                        </div>

                                    </div>
                                </div>
                                <!-- Card body END -->
                            </div>
                        </div>
                        <!-- Card END -->
                    </div>

                </div>
                <!-- Right sidebar END -->

            </div> <!-- Row END -->
        </div>
        <!-- Container END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

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
                            <img class="avatar-img rounded-circle" src="{{asset($user->img)}}" alt="">
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
        {{--Скрипт для изменеия аватара, в случае если форма не пустая скрипт читает из нее файл и отправляет его на сервер, при получении результата "success" обновляем страницу--}}
        function changeImg(){
            let button = document.getElementById("changeAvatar");
            let img = document.getElementById("img_input");

            if (img.value == ''){
                alert("Вы не выбрали файл");
            }else{
                let token = document.querySelector('input[name="_token"]').value
                let formData = new FormData(img_form)
                formData.append('_token', token);
                fetch('/updateImg', {
                    method: "post",
                    body: formData
                }).then(response=>response.json())
                    .then(result=>{
                        if(result.result === "success"){
                            location.reload();
                        }
                    })

            }
        }
        {{--скрипт для изменения имени и фамилии--}}
        function changeName() {
            let button = document.getElementById("changeName").innerText;
            let name = document.getElementById("userName");
            let lastname = document.getElementById("userLastname");

            if (button === 'Изменить имя и фамилию') {
                document.getElementById("buttonChangeName").innerHTML = '<button id="changeName" onclick="changeName()" class="btn btn-outline-danger" type="button" aria-expanded="false"> сохранить </button>'
                name.removeAttribute("readonly");
                name.classList.remove('form-control-plaintext');
                name.classList.add('form-control');
                lastname.removeAttribute("readonly");
                lastname.classList.remove('form-control-plaintext');
                lastname.classList.add('form-control');
            } else {
                document.getElementById("buttonChangeName").innerHTML = '<button class="btn btn-outline-danger" id="" type="button" data-bs-toggle="dropdown" aria-expanded="false">Изменить профиль </button> <ul class="dropdown-menu"> <li> <button id="changeName" class="dropdown-item" onclick="changeName()">Изменить имя и фамилию</button></li> <li><button class="dropdown-item"  type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Изменить изображение профиля</button></li> <li><button onclick="logout()" class="dropdown-item"  type="button">Выйти</button></li> </ul> <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <h1 class="modal-title fs-5" id="staticBackdropLabel">Изменить аватарку</h1> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button> </div> <div class="modal-body"> <form id="img_form" enctype="multipart/form-data"> <input class="form-control" id="img_input" name="img" type="file"> </div> <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button> <input type="button" id="changeAvatar" onclick="changeImg()" class="btn btn-primary" data-bs-dismiss="modal" value="Сохранить"></form> </div> </div> </div> </div>'
                name.setAttribute("readonly", "readonly");
                lastname.setAttribute("readonly", "readonly");
                name.classList.remove('form-control');
                name.classList.add('form-control-plaintext');
                lastname.classList.remove('form-control');
                lastname.classList.add('form-control-plaintext');
                let token = document.querySelector('input[name="_token"]').value
                let formData = new FormData()
                formData.append("name", name.value);
                formData.append("lastname", lastname.value);
                formData.append('_token', token);
                fetch('/updateName', {
                    method: "post",
                    body: formData
                });
            }

        }
        {{--скрипт для изменения информаци о себе --}}
        function about(){
            var button =  document.getElementById('change_about');
            var input =  document.getElementById('about');

            if (button.value === 'Изменить') {
                button.value = 'Сохранить';
                input.classList.remove('form-control-plaintext');
                input.classList.add('form-control');
                input.removeAttribute("readonly");
            } else {
                button.value = 'Изменить';
                input.classList.add('form-control-plaintext');
                input.classList.remove('form-control');
                input.classList.add('form-control-plaintext');
                input.setAttribute("readonly", "readonly");
                let token = document.querySelector('input[name="_token"]').value
                let formData = new FormData()
                formData.append("about", input.value);
                formData.append('_token', token);
                fetch('/updateAbout', {
                    method: "post",
                    body: formData
                });
            }
        }
        {{--скрипт для выхода со страницы--}}
        function logout(){
            let token = document.querySelector('input[name="_token"]').value
            let formData = new FormData()
            formData.append('_token', token);
            fetch('/logout', {
                method: "post",
                body: formData
            });
            location.reload();
        }
    </script>

    </body>
@endsection
