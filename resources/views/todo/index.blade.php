@extends('layouts.master')

@section('content')
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
@endsection
