<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body>
    <div id="app" class="container">
        <nav>
            <div class="nav-wrapper">
                {{-- <a href="#!" class="brand-logo"></a> --}}
                <ul class="left hide-on-med-and-down">
                <li><a href="#">Login as <strong>{{Auth::user()->name}}</strong></a></li>
                </ul>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a
                            class="waves-effect waves-light btn"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout<i class="material-icons right">exit_to_app</i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        @isUserAdmin
        <ul class="collapsible">
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">person_add</i>Invitations
                    <span class="new badge red">4</span>
                </div>
                <div class="collapsible-body">
                    <p>
                        <span class="red-text">
                        <strong>User</strong></span>
                        <a href="">Accept</a> | <a href="">Deny</a>
                    </p>
                    <p>
                        <span class="red-text">
                        <strong>User</strong></span>
                        <a href="">Accept</a> | <a href="">Deny</a>
                    </p>
                    <p>
                        <span class="red-text">
                        <strong>User</strong></span>
                        <a href="">Accept</a> | <a href="">Deny</a>
                    </p>
                </div>
            </li>
        </ul>
        @endisUserAdmin
        @yield('content')
    </div>
     <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
     <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Init collaps
            const collapsibleElements = document.querySelectorAll('.collapsible');
            let collapsibleOptions;
            const collapsibleInstances = M.Collapsible.init(collapsibleElements, collapsibleOptions);

            // Init select
            const selectElements = document.querySelectorAll('select');
            let selectOptions;
            const instances = M.FormSelect.init(selectElements, selectOptions);
        });
    </script>
</body>
</html>
