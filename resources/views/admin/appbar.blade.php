<!doctype html>
<html class="no-js h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Área administrativa - Dashboard</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap
            admin dashboard template pack that comes with lots of templates and
            components.">
    <meta name="viewport" content="width=device-width, initial-scale=1,
            shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{asset('css/shards-dashboards.1.1.0.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/extras.1.1.0.min.css')}}">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</head>

<body class="h-100">
    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light
                            bg-white
                            flex-md-nowrap border-bottom p-0">
                        <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                            <div class="d-table m-auto">
                                <img id="main-logo" class="d-inline-block
                                        align-top
                                        mr-1" style="max-width: 165px;" src="{{asset('img/logo-black.svg')}}" alt="Datasoft">

                            </div>
                        </a>
                        <a class="toggle-sidebar d-sm-inline d-md-none
                                d-lg-none">
                            <i class="material-icons">&#xE5C4;</i>
                        </a>
                    </nav>
                </div>
                <div class="nav-wrapper">
                    <h6 class="main-sidebar__nav-title">Gerenciar conteúdo</h6>
                    <ul class="nav nav--no-borders flex-column">
                        <li class="nav-item">
                            <a class='nav-link {{Request::is('admin/inicio/*') || Request::is('admin/inicio') ? 'active': ''}}' href="{{route('showContent', ['page'=> 'inicio'] )}}">
                                <i class="material-icons">home</i>
                                <span>Início</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link {{Request::is('admin/sobre/*') || Request::is('admin/sobre') ? 'active': ''}}' href="{{route('showContent', ['page'=> 'sobre'] )}}">
                                <i class="material-icons">group</i>
                                <span>Quem somos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link {{Request::is('admin/servicos/*') || Request::is('admin/servicos') ? 'active': ''}}' href="{{route('showContent', ['page'=> 'servicos'] )}}">
                                <i class="material-icons">work_outline</i>
                                <span>Serviços</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Request::is('admin/portfolio/*') || Request::is('admin/portfolio') ? 'active': ''}}" href="{{route('getPortfolioData')}}">
                                <i class="material-icons">menu_book</i>
                                <span>Portfólio</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link {{Request::is('admin/fale-conosco/*') || Request::is('admin/fale-conosco') ? 'active': ''}}' href="{{route('showContent', ['page'=> 'fale-conosco'] )}}">
                                <i class="material-icons">local_phone</i>
                                <span>Fale conosco</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Request::is('admin/downloads/*') || Request::is('admin/downloads') ? 'active': ''}}" href="{{route('getDownloads')}}">
                                <i class="material-icons">cloud_download</i>
                                <span>Downloads</span>
                            </a>
                        </li>
                    </ul>
                    <h6 class="main-sidebar__nav-title">Gerenciar Dados</h6>
                    <ul class="nav nav--no-borders flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{Request::is('admin/clientes/*') || Request::is('admin/clientes') ? 'active': ''}}" href="{{route('getCustomers')}}">
                                <i class="material-icons">people</i>
                                <span>Clientes datasoft</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link {{Request::is('admin/usuarios/*') || Request::is('admin/usuarios') ? 'active': ''}}' href="{{route('showUsers')}}">
                                <i class="material-icons">people</i>
                                <span>Usuários do sistema</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </aside>
            <!-- End Main Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0
                    offset-lg-2
                    offset-md-3">
                <div class="main-navbar sticky-top bg-white">
                    <!-- Main Navbar -->
                    <nav class="navbar justify-content-end navbar-light
                            flex-md-nowrap p-0">

                        <ul class="navbar-nav border-left flex-row">

                            <li class="nav-item dropdown" style="height: 100%; display: flex; align-items: center; margin-left: 80px">
                                <a class="nav-link dropdown-toggle
                                        text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="d-none d-md-inline-block">{{Auth::User()->name}}</span>
                                </a>
                                <div class="dropdown-menu
                                        dropdown-menu-small">
                                    <a class="dropdown-item" href="{{Route('showProfile')}}">
                                        <i class="material-icons">&#xE7FD;</i>
                                        Editar perfil</a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{Route('logout')}}">
                                        <i class="material-icons
                                                text-danger">&#xE879;</i>
                                        Sair </a>
                                </div>
                            </li>
                        </ul>
                        <nav class="nav">
                            <a href="#" class="nav-link nav-link-icon
                                    toggle-sidebar
                                    d-md-inline d-lg-none text-center
                                    border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                                <i class="material-icons">&#xE5D2;</i>
                            </a>
                        </nav>
                    </nav>
                </div>

                @yield('content')


            </main>
        </div>
    </div>
    <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('js/extras.1.1.0.min.js')}}"></script>
    <script src="{{asset('js/shards-dashboards.1.1.0.min.js')}}"></script>
    <script src="{{asset('js/app-blog-overview.1.1.0.js')}}"></script>
    <script src="{{asset('js/app-blog-overview.1.1.0.js')}}"></script>
    <script src="{{asset('js/admin-area.js')}}"></script>
    <script src="{{asset('js/app-blog-new-post.1.1.0.min.js')}}"></script>
    <script src="{{asset('js/edit-downloads.js')}}"></script>
    <script src="{{asset('js/edit-portfolio.js')}}"></script>
    <script src="{{asset('js/user-form-validate.js')}}"></script>
    <script src="{{asset('js/delete-customer.js')}}"></script>

    @yield('moreJs')
</body>

</html>