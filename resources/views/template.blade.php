<!DOCTYPE html>
<html lang="en">
<head>
    <title>Peba</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Peba.com">
    <meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset("storage/assets/images/favicon.ico")}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset("storage/assets/vendor/font-awesome/css/all.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("storage/assets/vendor/OverlayScrollbars-master/css/OverlayScrollbars.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("storage/assets/vendor/tiny-slider/dist/tiny-slider.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("storage/assets/vendor/choices.js/public/assets/styles/choices.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("storage/assets/vendor/glightbox-master/dist/css/glightbox.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("storage/assets/vendor/flatpickr/dist/flatpickr.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("storage/assets/vendor/plyr/plyr.css")}}">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>



    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset("storage/assets/css/style.css")}}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GMKQ4P9YMZ"></script>
    <script>
        window.addEventListener('scroll', function() {
            var footer = document.querySelector('footer');
            var scrollPosition = window.innerHeight + window.scrollY;
            if (scrollPosition >= document.body.offsetHeight) {
                footer.classList.add('show');
            } else {
                footer.classList.remove('show');
            }
        });
    </script>

</head>

<body>
    <!--Header-->

        <header class="navbar-light fixed-top header-static bg-mode">
            <div class="header-area">
            <!-- Logo Nav START -->
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <!-- Logo START -->
                    <a class="navbar-brand" href="/">
                        <img class="light-mode-item navbar-brand-item" src="{{asset("assets/images/logo.svg")}}" alt="logo">
                    </a>
                    <!-- Logo END -->

                    <!-- Responsive navbar toggler -->
                    <button class="navbar-toggler ms-auto icon-md btn btn-light p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-animation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>

                    <!-- Main navbar START -->

                    <!-- Nav right START -->
                    <ul class="nav flex-nowrap align-items-center ms-sm-3 list-unstyled">
                        <li class="nav-item ms-2">
                            <a class="nav-link icon-md btn btn-light p-0" href="/messages"><i class="bi bi-chat-left-text"></i></a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link icon-md btn btn-light p-0" href="/search"><i class="bi bi-search"></i></a>
                        </li>
                        <li class="nav-item dropdown ms-2">
                            <a class="nav-link icon-md btn btn-light p-0" href="/friends"><i class="bi bi-people-fill"></i></a>
                        </li>
                        <!-- Notification dropdown END -->

                        <li class="nav-item ms-2 dropdown">
                            <a class="nav-link btn icon-md p-0" href="/profile">
                                <img class="avatar-img rounded-2" src="{{asset(auth()->user()->img)}}" alt="">
                            </a>
                            <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
                                <!-- Profile info -->

                                <!-- Links -->
                                <li><a class="dropdown-item" href="settings.html"><i class="bi bi-gear fa-fw me-2"></i>Settings & Privacy</a></li>
                                <li>
                                    <a class="dropdown-item" href="https://support.webestica.com/" target="_blank">
                                        <i class="fa-fw bi bi-life-preserver me-2"></i>Support
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="docs/index.html" target="_blank">
                                        <i class="fa-fw bi bi-card-text me-2"></i>Documentation
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item bg-danger-soft-hover" href="sign-in-advance.html"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
                                <li> <hr class="dropdown-divider"></li>
                            </ul>
                        </li>
                        <!-- Profile START -->

                    </ul>
                    <!-- Nav right END -->
                </div>
            </nav></div>
        </header>

    <!-- Main Content-->
    <main>
        @yield('content')
    </main>
    .
    <!--Footer-->
    <footer class="">
             <p class="small text-center mt-2">©2023 <a class="text-body" target="_blank" href="#"> Peba </a></p>
    </footer>
<!-- ======================= -->

<!-- Bootstrap JS -->
<script src="{{asset("storage/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js")}} "></script>


<!-- Vendors -->
<script src="{{asset("storage/assets/vendor/tiny-slider/dist/tiny-slider.js")}}"></script>
<script src="{{asset("storage/assets/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js")}}"></script>
<script src="{{asset("storage/assets/vendor/choices.js/public/assets/scripts/choices.min.js")}}"></script>
<script src="{{asset("storage/assets/vendor/glightbox-master/dist/js/glightbox.min.js")}}"></script>
<script src="{{asset("storage/assets/vendor/flatpickr/dist/flatpickr.min.js")}}"></script>
<script src="{{asset("storage/assets/vendor/plyr/plyr.js")}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- Theme Functions -->
    <script src="{{asset("storage/assets/js/functions.js")}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous">
    </script>
</body>
</html>
