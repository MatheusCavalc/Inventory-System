<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    <script src="https://kit.fontawesome.com/29a362bf39.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/css/main.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Inventory System</span>
                    </a>

                    @if ($user->user_level == 'admin' && ($user->status = 'active'))
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                            id="menu">
                            <li class="nav-item">
                                <a href="/" class="nav-link align-middle px-0">
                                    <i class="fas fa-home"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="/users" class="nav-link px-0 align-middle">
                                    <i class="fas fa-user"></i> <span class="ms-1 d-none d-sm-inline">User
                                        Management</span> </a>
                            </li>
                    @endif

                    @if ($user->user_level == 'admin' || ($user->user_level == 'special' && ($user->status = 'active')))
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                            id="menu">

                            <li>
                                <a href="/categories" class="nav-link px-0 align-middle">
                                    <i class="fas fa-list"></i> <span
                                        class="ms-1 d-none d-sm-inline">Categories</span></a>
                            </li>
                            <li>
                                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                    <i class="fas fa-align-center"></i> <span
                                        class="ms-1 d-none d-sm-inline">Products</span></a>
                                <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                    <li class="w-100">
                                        <a href="/products" class="nav-link px-0"> <span class="d-none d-sm-inline">--
                                                Manage Products</span></a>
                                    </li>
                                    <li>
                                        <a href="/products/add" class="nav-link px-0"> <span
                                                class="d-none d-sm-inline">-- Add Products</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endif

                    @if ($user->user_level == 'admin' || ($user->user_level == 'user' && ($user->status = 'active')))
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                            id="menu">
                            <li>
                                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="fas fa-credit-card"></i> <span
                                        class="ms-1 d-none d-sm-inline">Sales</span> </a>
                                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                    <li class="w-100">
                                        <a href="/sales" class="nav-link px-0"> <span class="d-none d-sm-inline">--
                                                Manage Sales</span></a>
                                    </li>
                                    <li>
                                        <a href="/sales/add" class="nav-link px-0"> <span class="d-none d-sm-inline">--
                                                Add Sales</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                        </ul>
                    @endif

                    @if ($user->user_level == 'admin' && ($user->status = 'active'))
                        <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fas fa-credit-card"></i> <span class="ms-1 d-none d-sm-inline">Sales Report</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="/sales/report" class="nav-link px-0"> <span class="d-none d-sm-inline">-- Sales
                                        by dates</span></a>
                            </li>
                            <li>
                                <a href="/sales/monthly" class="nav-link px-0"> <span class="d-none d-sm-inline">--
                                        Monthly sales</span></a>
                            </li>
                            <li>
                                <a href="/sales/daily" class="nav-link px-0"> <span class="d-none d-sm-inline">-- Daily
                                        sales</span></a>
                            </li>
                    @endif

                    </ul>
                    </li>
                    </ul>

                    <hr>

                    <div class="dropdown pb-4">
                        <a href="#"
                            class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://avatars.githubusercontent.com/u/105112560?v=4" alt="hugenerd"
                                width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">{{ $user->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="/user/profile"><i class="fas fa-cog"></i> Settings</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <a href="/logout" class="dropdown-item"
                                        onclick="event.preventDefault();
                                       this.closest('form').submit();">
                                        <i class="fas fa-power-off"></i>
                                        Logout
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                <div>
                    <output id="sse"></output>
                </div>


                @if (session('msg'))
                    <p class="msg">{{ session('msg') }}</p>
                @endif

                @yield('content')

            </div>
        </div>
    </div>
    <script type="text/javascript">
        async function getHours() {
            let currDate = new Date();
            let hoursMin = currDate.getHours() + ':' + currDate.getMinutes();
            document.getElementById('sse').innerText = hoursMin
            setTimeout(() => getHours(), 1000);
        }
        getHours()
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
