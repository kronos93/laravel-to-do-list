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
        <form action="{{ route('todo.send-invitation') }}" method="POST">
            @csrf
            <div class="input-field col s6">
                <select name="user">
                    <option value="" disabled selected>Send invitation to:</option>
                    @foreach($coworkers as $coworker)
                        <option value="{{ $coworker->id }}">{{$coworker->name}}</option>
                    @endforeach
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
        @foreach($coworkers as $coworker)
            <li class="collection-item"><div>{{ $coworker->worker->name }}<a href="{{ route('todo.delete-coworker', $coworker->id) }}" class="secondary-content"><i class="material-icons">delete</i></a></div></li>
        @endforeach
    </ul>
    @endisUserAdmin
@endsection
