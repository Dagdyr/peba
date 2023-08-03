@extends('template')
@section('content')
    <body>

    <!-- =======================
    Header START -->
    <main>


        <!-- Container START -->
        <div class="container">
            <div class="row g-4">
                @csrf
                <!-- Main content START -->
                <div class="col-lg-8 vstack gap-4">
                    <!-- My profile START -->
                    <div class="card ">
                        <!-- Cover image -->
                        <div class="h-60px rounded-top"></div>
                        <!-- Card body START -->
                        <div class="card-body py-0 row">
                            <!-- Avatar -->
                            <div class=" mt-n5 col-sm-4" style=" height: 128px;  width: 128px;">
                                <img height="128" width="128" id="user_avatar"
                                     class="rounded-circle border border-white"
                                     src="{{asset($user->img)}}" alt="">
                            </div>
                            <div class="ms-sm-4 mt-sm-3 col-sm-8">
                                <div class="g-1 col-sm-12 row">
                                    <!-- Info -->
                                    <div class="col-sm-8">
                                        <input type="text" aria-label="Имя" class="h5 form-control-plaintext"
                                               id="userName" readonly value="{{$user->name.' '.' '.$user->lastname}}">
                                    </div>
                                    <!-- Button -->
                                    <div class="col-sm-4 row justify-content-end ">
                                        <div class="col-sm-6 p-2">
                                            @if(\App\Models\Friend::where('user_id', auth()->user()->getAuthIdentifier())->where('friend_id', $user->id)->where('status', 'pending')->exists())
                                                <button class="btn btn-outline-warning" onclick="sendFriendRequest({{$user->id}})" data-bs-toggle="tooltip" data-bs-placement="top" title="Ожидание ответа на заявку" id="" type="button" aria-expanded="false"><i class="bi bi-arrow-clockwise"></i></button>
                                            @elseif(\App\Models\Friend::where('user_id', auth()->user()->getAuthIdentifier())->where('friend_id', $user->id)->orWhere('user_id', $user->id)->where('friend_id', auth()->user()->getAuthIdentifier())->exists())
                                                <button class="btn btn-outline-danger" onclick="delFriend({{$user->id}})" data-bs-toggle="tooltip" data-bs-placement="top" title="Удалить из списка друзей" id="" type="button" aria-expanded="false"><i class="bi bi-person-x"></i></button>
                                            @else
                                                <button class="btn btn-outline-success" onclick="sendFriendRequest({{$user->id}})" data-bs-toggle="tooltip" data-bs-placement="top" title="Добавить в друзья" id="" type="button" aria-expanded="false"><i class="bi bi-person-add"></i></button>
                                            @endif

                                        </div>
                                        <div class="col-sm-6 p-2">
                                            <button class="btn btn-outline-primary"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Написать сообщение" id="" type="button"
                                                    aria-expanded="false"><i class="bi bi-chat-left-text"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- My profile END -->
                    @csrf
                    <div class="" id="main_content">
                        @foreach($posts as $post)
                            <div class="card mb-3">
                                <!-- Card header START -->
                                <div class="card-header border-0 pb-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <!-- Avatar -->
                                            <div class="avatar me-2">
                                                <img class="avatar-img rounded-circle" src="{{asset($user->img)}}"
                                                     alt="">
                                            </div>
                                            <!-- Info -->
                                            <div>
                                                <div class="nav nav-divider">
                                                    <h6 class="nav-item card-title mb-0">{{$user->name.' '.$user->lastname}}</h6>
                                                    <span
                                                        class="nav-item small">{{Carbon\Carbon::parse($post->created_at)->translatedFormat('d  F  H:i') }}</span>
                                                </div>
                                                <p class="mb-0 small">{{$user->about}}</p>
                                            </div>
                                        </div>
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
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send
                                                via Direct Message</a></li>
                                        <li><a class="dropdown-item" href="#"> <i
                                                    class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy
                                                link to post</a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share
                                                post via …</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#"> <i
                                                    class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a>
                                        </li>
                                    </ul>
                                    </li>
                                    <!-- Card share action END -->
                                    </ul>
                                    <!-- Feed react END -->
                                    <!-- Card body END -->
                                </div>
                            </div>
                        @endforeach
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
                                    <input type="text" id="about" class="form-control-plaintext" readonly
                                           value="{{$user->about}}">
                                    <!-- Date time -->
                                    <ul class="list-unstyled mt-3 mb-0">
                                        <li class="mb-2"><i class="bi bi-calendar-date fa-fw pe-1"></i> Дата рождения:
                                            <strong> {{$user->birthday}} </strong></li>
                                        <li><i class="bi bi-envelope fa-fw pe-1"></i> Email:
                                            <strong> {{$user->email}} </strong></li>
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
                                @if($user->allFriends()->isEmpty())
                                    <div
                                        class="card-header d-sm-flex justify-content-between align-items-center border-0">
                                        <h5 class="card-title">У пользователя нет друзей</h5>
                                    </div>
                                @else
                                    <!-- Card header START -->
                                    <div
                                        class="card-header d-sm-flex justify-content-between align-items-center border-0">
                                        <h5 class="card-title">Друзья <span
                                                class="badge bg-danger bg-opacity-10 text-danger">{{$user->friends_count}}</span>
                                        </h5>
                                        <a class="btn btn-primary-soft btn-sm" href="{{route('showAllFriends', ['userId'=>$user->id])}}"> Показать всех друзей</a>
                                    </div>
                                    <!-- Card header END -->
                                    <!-- Card body START -->
                                    <div class="card-body position-relative pt-0">
                                        <div class="row g-3">
                                                @foreach($user->allFriends()->take(4) as $friend)
                                                    <div class="col-6">
                                                        <!-- Friends item START -->
                                                        <div class="card shadow-none text-center h-100">
                                                            <!-- Card body -->
                                                            <div class="card-body p-2 pb-0">
                                                                <div class="avatar avatar-xl">
                                                                    <a href="/profile/{{$friend->id}}"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset($friend->img)}}" alt=""></a>
                                                                </div>
                                                                <h6 class="card-title mb-1 mt-3"><a
                                                                        href="/profile/{{$friend->id}}"> {{$friend->name.' '.$friend->lastname}} </a>
                                                                </h6>
                                                                <p class="mb-0 small lh-sm">{{$friend->about}}</p>
                                                            </div>
                                                        </div>
                                                        <!-- Friends item END -->
                                                    </div>
                                                @endforeach
                                        </div>
                                    </div>
                                    <!-- Card body END -->
                                @endif

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
    </body>
    <script>
        //Функция для отправки заявки в друзья
        function sendFriendRequest(id){
            let token = document.querySelector('input[name="_token"]').value
            let formData = new FormData()
            formData.append('_token', token);
            fetch(`/friend/send-request/${id}`, {
                method: "post",
                body: formData
            }).then(response=>response.json())
                .then(result=>{
                    if(result.result === "success"){
                        alert('Заявка в друзья успешно отправленна!')
                        location.reload();
                    }else if(result.result === "send"){
                        alert('Вы уже отправили данному пользователю заявку в друзья!')
                    }else{
                        alert('Ошибка, попробуйте позже!')
                    }
                })

        }

        //Функция для удаления пользователя из списка друзей

        function delFriend(id){
            let token = document.querySelector('input[name="_token"]').value
            let formData = new FormData()
            formData.append('_token', token);
            fetch(`/friend/reject/${id}`, {
                method: "post",
                body: formData
            }).then(response=>response.json())
                .then(result=>{
                    if(result.result === "success"){
                        alert('Пользователь успешно удален из вашего списка друзей!')
                        location.reload();
                    }else{
                        alert('Ошибка, попробуйте позже!')
                    }
                })

        }


    </script>
@endsection
