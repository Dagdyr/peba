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
    <link rel="shortcut icon" href="storage/assets/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="storage/assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="storage/assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="storage/assets/vendor/OverlayScrollbars-master/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" type="text/css" href="storage/assets/vendor/tiny-slider/dist/tiny-slider.css">
    <link rel="stylesheet" type="text/css" href="storage/assets/vendor/choices.js/public/assets/styles/choices.min.css">
    <link rel="stylesheet" type="text/css" href="storage/assets/vendor/glightbox-master/dist/css/glightbox.min.css">
    <link rel="stylesheet" type="text/css" href="storage/assets/vendor/dropzone/dist/dropzone.css">
    <link rel="stylesheet" type="text/css" href="storage/assets/vendor/dropzone/dist/basic.css">
    <link rel="stylesheet" type="text/css" href="storage/assets/vendor/dropzone/dist/min/basic.min.css">
    <link rel="stylesheet" type="text/css" href="storage/assets/vendor/flatpickr/dist/flatpickr.css">
    <link rel="stylesheet" type="text/css" href="storage/assets/vendor/plyr/plyr.css">
    <link rel="stylesheet" type="text/css" href="storage/assets/vendor/zuck.js/dist/zuck.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>



    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="storage/assets/css/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GMKQ4P9YMZ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-GMKQ4P9YMZ');
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
                        <img class="light-mode-item navbar-brand-item" src="assets/images/logo.svg" alt="logo">
                        <img class="dark-mode-item navbar-brand-item" src="assets/images/logo.svg" alt="logo">
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
                            <a class="nav-link icon-md btn btn-light p-0" href="/messages">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item dropdown ms-2">
                            <a class="nav-link icon-md btn btn-light p-0" href="/friends" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                <span class="badge-notif animation-blink"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0" aria-labelledby="notifDropdown">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6 class="m-0">Notifications <span class="badge bg-danger bg-opacity-10 text-danger ms-2">4 new</span></h6>
                                        <a class="small" href="#">Clear all</a>
                                    </div>
                                    <div class="card-body p-0">
                                        <ul class="list-group list-group-flush list-unstyled p-2">
                                            <!-- Notif item -->
                                            <li>
                                                <div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">
                                                    <div class="avatar text-center d-none d-sm-inline-block">
                                                        <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
                                                    </div>
                                                    <div class="ms-sm-3">
                                                        <div class=" d-flex">
                                                            <p class="small mb-2"><b>Judy Nguyen</b> sent you a friend request.</p>
                                                            <p class="small ms-3 text-nowrap">Just now</p>
                                                        </div>
                                                        <div class="d-flex">
                                                            <button class="btn btn-sm py-1 btn-primary me-2">Accept </button>
                                                            <button class="btn btn-sm py-1 btn-danger-soft">Delete </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- Notif item -->
                                            <li>
                                                <div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3 position-relative">
                                                    <div class="avatar text-center d-none d-sm-inline-block">
                                                        <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
                                                    </div>
                                                    <div class="ms-sm-3 d-flex">
                                                        <div>
                                                            <p class="small mb-2">Wish <b>Amanda Reed</b> a happy birthday (Nov 12)</p>
                                                            <button class="btn btn-sm btn-outline-light py-1 me-2">Say happy birthday 🎂</button>
                                                        </div>
                                                        <p class="small ms-3">2min</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- Notif item -->
                                            <li>
                                                <a href="#" class="list-group-item list-group-item-action rounded d-flex border-0 mb-1 p-3">
                                                    <div class="avatar text-center d-none d-sm-inline-block">
                                                        <div class="avatar-img rounded-circle bg-success"><span class="text-white position-absolute top-50 start-50 translate-middle fw-bold">WB</span></div>
                                                    </div>
                                                    <div class="ms-sm-3">
                                                        <div class="d-flex">
                                                            <p class="small mb-2">Webestica has 15 like and 1 new activity</p>
                                                            <p class="small ms-3">1hr</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- Notif item -->
                                            <li>
                                                <a href="#" class="list-group-item list-group-item-action rounded d-flex border-0 p-3 mb-1">
                                                    <div class="avatar text-center d-none d-sm-inline-block">
                                                        <img class="avatar-img rounded-circle" src="assets/images/logo/12.svg" alt="">
                                                    </div>
                                                    <div class="ms-sm-3 d-flex">
                                                        <p class="small mb-2"><b>Bootstrap in the news:</b> The search giant’s parent company, Alphabet, just joined an exclusive club of tech stocks.</p>
                                                        <p class="small ms-3">4hr</p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="#" class="btn btn-sm btn-primary-soft">See all incoming activity</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Notification dropdown END -->

                        <li class="nav-item ms-2 dropdown">
                            <a class="nav-link btn icon-md p-0" href="/profile">
                                <img class="avatar-img rounded-2" src="{{auth()->user()->img}}" alt="">
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

    <!--Footer-->
    <div class="footer">
        <ul class="nav small mt-4 justify-content-center lh-1">
            <li class="nav-item">
                <a class="nav-link" href="my-profile-about.html">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="settings.html">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="https://support.webestica.com/login">Support </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="docs/index.html">Docs </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="help.html">Help</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="privacy-and-terms.html">Privacy & terms</a>
            </li>

        </ul>
             <p class="small text-center mt-1">©2023 <a class="text-body" target="_blank" href=""> Peba </a></p>
    </div>
<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="storage/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="storage/assets/vendor/tiny-slider/dist/tiny-slider.js"></script>
<script src="storage/assets/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js"></script>
<script src="storage/assets/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="storage/assets/vendor/glightbox-master/dist/js/glightbox.min.js"></script>
<script src="storage/assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
<script src="storage/assets/vendor/plyr/plyr.js"></script>
<script src="storage/assets/vendor/dropzone/dist/dropzone-amd-module.js"></script>
<script src="storage/assets/vendor/dropzone/dist/dropzone.js"></script>
<script src="storage/assets/vendor/zuck.js/dist/zuck.min.js"></script>
<script src="storage/assets/js/zuck-stories.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- Theme Functions -->
<script src="storage/assets/js/functions.js"></script>


</body>
</html>
