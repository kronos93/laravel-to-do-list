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
            @forelse($tasks as $task)
                <tr>
                    <td>
                        <a href="{{ route('todo.update-status-task',$task->id) }}" title="Mark task as {{ $task->complete === 0 ? 'completed' : 'uncompleted'}}">
                            @if($task->complete === 0)
                            {{ $task->body }}
                            @else
                                <strike class="grey-text">{{ $task->body }}</strike>
                            @endif
                        </a>
                    </td>
                    @isUserAdmin
                    <td>{{ $task->user->name }}</td>
                    @endisUserAdmin
                    <td><a class="btn waves-effect waves-light" href="{{ route('todo.edit',$task->id) }}" title="Edit task"><i class="small material-icons">edit</i></a></td>
                    <td>
                        <form action="{{ route('todo.destroy',$task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn waves-effect waves-light" type="submit" title="Delete task"><i class="small material-icons">delete</i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr colspan="4">Sin tareas :(</tr>
            @endforelse
        </tbody>
    </table>
    {{ $tasks->links('vendor.pagination.materialize') }}

    @include('todo.partials.frm.create')
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
