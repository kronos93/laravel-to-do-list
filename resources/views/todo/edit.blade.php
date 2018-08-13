@extends('layouts.master')

@section('content')
<!-- Form to edit -->
<div class="row">
    <form class="col s12" action="{{ route('todo.update',$task->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="input-field col s6">
                <input id="body" name="body" type="text" class="validate" value="{{ $task->body }}">
                <label for="body">Edit task</label>
            </div>
            @include('todo.partials.coworkers')
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Edit task
            <i class="material-icons right">edit</i>
        </button>
    </form>
</div>
@endsection
