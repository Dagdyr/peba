@extends('template')
    @section('content')
        <div class="row">
            <div class="container col-md-7">


                <h2>Поиск <i class="bi bi-search"></i></h2>
                <div class="col-sm-12 mb-2">
                    <form class="">
                        <div class="row">
                            <div class="col-sm-8">
                                <input class="form-control col-sm-8" onkeyup="const spaceRegex = /\s\s+/g;const regex = /['0-9','A-z','',':','_','@','#','!','№',';','$','%','^','?','&','*','(',')','=','+','{','}','<','>','.','~']/;if(spaceRegex.test(this.value)) {this.value = this.value.replace(spaceRegex, ' ');}if(regex.test(this.value)) {this.value = this.value.replace(regex, '');}" type="text" id="search_input" name="search" value="{{$searchRequest}}" placeholder="Поиск...">
                            </div>
                            <div class="col-sm">
                                <input type="submit" class="btn btn-primary" value="Найти">
                            </div>
                        </div>
                    </form>
                </div>


                @csrf

                <div class="row col-sm-12">
                    @if($users->isNotEmpty())
                        @foreach($users as $user)
                            <!-- Friends item START -->
                            <div class="card shadow-none text-center h-100 m-2 col-sm-2" style="overflow-x:hidden;">
                                <!-- Card body -->
                                <div class="card-body" style="max-height: 193px; overflow-x:hidden;">
                                    <div class="avatar avatar-xl">
                                        <a href="{{route('profile.edit', ['userId'=> $user->id])}}"><img
                                                class="avatar-img rounded-circle" src="{{asset($user->img)}}" alt=""></a>
                                    </div>
                                    <h6 class="card-title mb-1 mt-3">
                                        <a href="{{route('profile.edit', ['userId'=> $user->id])}}">{{$user->name.' '.$user->lastname }}</a>
                                    </h6>
                                    <p class="mb-0 small lh-sm">{{$user->about}}</p>
                                </div>
                            </div>
                        @endforeach]
                        <div class="mt-1">
                            {{$users->links()}}
                        </div>
                    @else
                        <p> Ничего не найдено</p>
                    @endif


                </div>
            </div>





@endsection
