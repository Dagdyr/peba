<head>
    <title>Peba</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Peba.com">
    <meta name="description" content="Peba">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>

<!-- **************** MAIN CONTENT START **************** -->
<main>

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 py-5">
            <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
                <div class="card card-body text-center p-4 p-sm-5">
                    <h1 class="mb-2">Авторизация</h1>
                    <p class="mb-0">Нет аккаунта?<a href="/register"> Нажмите чтобы создать аккаунт</a></p>
                    <form class="mt-sm-4" method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3 input-group-lg">
                            <input type="email" id="email" required class="form-control" name="email" placeholder="Введите email">
                        </div>
                            @if($errors->get('email'))
                            <div class="danger">
                                     @foreach($errors->get('email') as $error)
                                         <p class="">{{$error}}</p>
                                     @endforeach
                            </div>
                             @endif
                        <div class="mb-3 position-relative">
                            <div class="input-group input-group-lg">
                                <input class="form-control fakepassword" name="password" required type="password" id="psw-input" placeholder="Введите пароль">
                                <span class="input-group-text p-0">
                                       <i class="fakepasswordicon fa-solid fa-eye-slash cursor-pointer p-2 w-40px"></i>
                                </span>
                            </div>
                        </div>
                        @if($errors->get('password'))
                            <div class="alert alert-danger" >
                                <ul>
                                    @foreach($errors->get('password') as $error)
                                        <li class="small">{{$error}}</li>
                                    @endforeach</ul>
                            </div>
                        @endif
                        <div class="mb-3 d-sm-flex justify-content-between">
                            <div>
                                <input type="checkbox" class="form-check-input" id="remember_me" name="remember" >
                                <label class="form-check-label" for="remember_me">Запомнить меня?</label>
                            </div>
                            <a href="/forgot-password">Забыли пароль?</a>
                        </div>
                        <div class="d-grid"><button type="submit" class="btn btn-lg btn-primary">Войти</button></div>
                        <p class="mb-0 mt-3">©2023 <a target="_blank" href="/">Peba.</a> Все права защищенны</p>
                    </form>
                    @if($errors->get('auth'))
                        <div class="alert alert-danger" >
                            <ul>
                                @foreach($errors->get('auth') as $error)
                                    <li class="small">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</main>


<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="assets/vendor/pswmeter/pswmeter.min.js"></script>

<!-- Theme Functions -->
<script src="assets/js/functions.js"></script>

</body>



{{--

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
--}}
