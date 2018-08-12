@extends('layouts.master')

@section('content')
    <h1 class="center-align green-text text-darken-4">To-do list</h1>
    <table>
        <thead>
            <tr>
                <th>Task</th>
                @isUserAdmin
                <th>Assigned to</th>
                @endisUserAdmin
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="">Task XXXX</a></td>
                @isUserAdmin
                <td>User</td>
                @endisUserAdmin
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
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input id="task" name="task" type="text" class="validate">
                    <label for="task">New task</label>
                </div>

                @include('todo.partials.coworkers')
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Add new task
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
    @isUserWorker
        <form action="">
            <div class="input-field col s6">
                <select>
                    <option value="" disabled selected>Send invitation to:</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
                <label>Send invitation:</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Send invitation
                <i class="material-icons right">send</i>
            </button>
        </form>
    @endisUserWorker

    @isUserAdmin
    <ul class="collection with-header">
        <li class="collection-header"><h4>My coworkers</h4></li>
        <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">delete</i></a></div></li>
    </ul>
    @endisUserAdmin
@endsection
