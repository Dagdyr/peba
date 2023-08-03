@extends('template')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="container col-md-7">

            <!-- Заголовок -->
            <h3>Мои друзья:</h3>
            @csrf

            <!-- Карточки с друзьями -->
            <div class="row ">
                @foreach($friends as $friend)
                    <!-- Friends item START -->
                    <div class="card shadow-none text-center h-100 m-2 col-sm-2">
                        <!-- Card body -->
                        <div class="card-body" style="max-height: 193px;">
                            <div class="avatar avatar-xl">
                                <a href="{{route('profile.edit', ['userId'=> $friend->id])}}"><img
                                        class="avatar-img rounded-circle" src="{{asset($friend->img)}}" alt=""></a>
                            </div>
                            <h6 class="card-title mb-1 mt-3"><a
                                    href="{{route('profile.edit', ['userId'=> $friend->id])}}">{{$friend->name.' '.$friend->lastname }}</a>
                            </h6>
                            <p class="mb-0 small lh-sm">{{$friend->about}}</p>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer p-2 border-0 mb-2">
                            <button href="{{route('chat', ['userId'=>$friend->id])}}" class="btn btn-sm btn-primary"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Отправить сообщение"><i
                                    class="bi bi-chat-left-text"></i></button>
                            <button class="btn btn-sm btn-danger" onclick="delFriend({{$friend->id}})"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Удалить из друзей"><i
                                    class="bi bi-person-x"></i></button>
                        </div>
                    </div>
                    <!-- Friends item END -->
                @endforeach


            </div>
        </div>

        <div class="col-md-3 my-2 ">

            <h3> Заявки в друзья: </h3>

            @foreach($applications as $application)
                {{--Блок заявки--}}
                <div class="card mb-2 col-md-11 ">
                    <div class="card-header p-2">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="d-flex align-items-start col-md-8">
                                <!-- Avatar -->
                                <div class="avatar me-2">
                                    <a href='/profile/{{$application->id}}'><img class="avatar-img rounded-circle"
                                                                                 src="{{asset($application->img)}}"
                                                                                 alt=""></a>
                                </div>
                                <!-- Info -->
                                <div>
                                    <div class="nav nav-divider pt-2">
                                        <a href='/profile/{{$application->id}}'><h6
                                                class="nav-item card-title mb-0">{{$application->name.' '.$application->lastname}}</h6>
                                        </a>
                                    </div>
                                    <p class="mb-0 small">{{$application->about}}</p>
                                </div>
                            </div>

                            <div class="justify-content-end">
                                <div class="ms-3 pt-1">
                                    <button onclick="acceptApplicationRequest({{$application->id}})" class="btn btn-outline-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Принять заявку в друзья"><i class="bi bi-person-add"></i></button>
                                    <button onclick="rejectApplicationRequest({{$application->id}})" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Отклонить заявку в друзья"><i class="bi bi-person-dash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Конец блока заявки--}}
            @endforeach

        </div>
    </div>
    <script>
        function acceptApplicationRequest(id) {
            let token = document.querySelector('input[name="_token"]').value
            let formData = new FormData()
            formData.append('_token', token);
            fetch(`/acceptApplicationRequest/${id}`, {
                method: "post",
                body: formData
            }).then(response => response.json())
                .then(result => {
                    if (result.result === "success") {
                        alert('Заявка в друзья успешно принята!')
                        location.reload();
                    } else {
                        alert('Ошибка, попробуйте позже!')
                    }
                })

        }

        function rejectApplicationRequest(id) {
            let token = document.querySelector('input[name="_token"]').value
            let formData = new FormData()
            formData.append('_token', token);
            fetch(`/rejectApplicationRequest/${id}`, {
                method: "post",
                body: formData
            }).then(response => response.json())
                .then(result => {
                    if (result.result === "success") {
                        alert('Заявка в друзья успешно отклонена!')
                        location.reload();
                    } else {
                        alert('Ошибка, попробуйте позже!')
                    }
                })

        }

        function delFriend(id) {
            let token = document.querySelector('input[name="_token"]').value
            let formData = new FormData()
            formData.append('_token', token);
            fetch(`/friend/reject/${id}`, {
                method: "post",
                body: formData
            }).then(response => response.json())
                .then(result => {
                    if (result.result === "success") {
                        alert('Пользователь успешно удален из вашего списка друзей!')
                        location.reload();
                    } else {
                        alert('Ошибка, попробуйте позже!')
                    }
                })

        }
    </script>
@endsection
