@extends('template')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="container col-md-7">

            <!-- Заголовок -->
            <h3> <p class="small">Друзья <a href="/profile/{{$user->id}}">{{$user->name.'  '.$user->lastname}}</a>:</p></h3>
            @csrf

            <!-- Карточки с друзьями -->
            <div class="row ">
                @foreach($friends as $friend)
                    <!-- Friends item START -->
                    <div class="card shadow-none text-center h-100 m-2 col-sm-2">
                        <!-- Card body -->
                        <div class="card-body" style="max-height: 193px; overflow-x:hidden;">
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
                        </div>
                    </div>
                    <!-- Friends item END -->
                @endforeach


            </div>
        </div>
        <div class="col-md-2 my-2 ">
        </div>
    </div>
    <script>
    </script>
@endsection
