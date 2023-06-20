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

    <!-- Container START -->
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 py-5">
            <!-- Main content START -->
            <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
                <!-- Sign up START -->
                <div class="card card-body rounded-3 p-4 p-sm-5">
                    <div class="text-center">
                        <!-- Title -->
                        <h1 class="mb-2">Регистрация</h1>
                        <span class="d-block">Уже есть аккаунт? <a href="/login">Войти</a></span>
                    </div>

                    <!-- Form START -->
                    <form class="mt-4" method="post" action="{{route('register')}}">
                        @csrf
                        <!-- Email -->
                        <div class="mb-3 input-group-lg">
                            <input name="name" type="text" class="form-control" placeholder="Введите имя">
                        </div>
                        <div class="mb-3 input-group-lg">
                            <input name="email" type="email" class="form-control" placeholder="Введите email">
                        </div>
                        <!-- New password -->
                        <div class="mb-3 position-relative">
                            <!-- Input group -->
                            <div class="input-group input-group-lg">
                                <input class="form-control fakepassword" type="password" name="password" id="password" placeholder="Придумайте пароль">
                            </div>
                        </div>
                        <!-- Confirm password -->
                        <div class="mb-3 input-group-lg">
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Подтвердите пароль">
                        </div>
                        <!-- Button -->
                       <input type="submit" class="form-control btn btn-lg btn-primary" value="Зарегистрироваться" >
                        <!-- Copyright -->
                        <p class="mb-0 mt-3 text-center">©2023 Peba Все права защищенны</p>

                        <div class="">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach</ul>
                                    @endif
                                </div>
                        </div>
                    </form>
                    <!-- Form END -->
                </div>
                <!-- Sign up END -->
            </div>
        </div> <!-- Row END -->
    </div>
    <!-- Container END -->

</main>

<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="assets/vendor/pswmeter/pswmeter.min.js"></script>

<!-- Theme Functions -->
<script src="assets/js/functions.js"></script>

</body>
</html>













{{--<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>--}}
