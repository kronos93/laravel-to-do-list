<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>To-Do list app</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

    </head>
    <body>
        <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> -->
        <!--JavaScript at end of body for optimized loading-->
        <div class="container">
            <p>Login as <strong>User</strong><a class="waves-effect waves-light btn"><i class="material-icons left">exit_to_app</i>Logout</a></p>
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
            <h1 class="center-align green-text text-darken-4">To-do list</h1>
            <table>
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Assigned to</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="">Task XXXX</a></td>
                        <td>User</td>
                        <td><a href="" title="Delete task"><i class="small material-icons">edit</i></a></td>
                        <td><a href="" title="Edit task"><i class="small material-icons">delete</i></a></td>
                    </tr>
                </tbody>
            </table>
            <ul class="pagination">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>
            <!-- Form to add -->
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="task" name="task" type="text" class="validate">
                            <label for="task">New task</label>
                        </div>

                        <div class="input-field col s6">
                            <select>
                                <option value="" disabled selected>Assigned to:</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <label>Assigned tasks:</label>
                        </div>
                     </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Add new task
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
            <ul class="collection with-header">
                <li class="collection-header"><h4>My coworkers</h4></li>
                <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">delete</i></a></div></li>
            </ul>
            <!-- Form to edit -->
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="task" name="task" type="text" class="validate" value="Task to edit">
                            <label for="task">Edit task</label>
                        </div>

                        <div class="input-field col s6">
                            <select>
                                <option value="" disabled selected>Assigned to:</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <label>Assigned tasks:</label>
                        </div>
                     </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Edit task
                        <i class="material-icons right">edit</i>
                    </button>
                </form>
            </div>
        </div>
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
