@extends('layouts.master')

@section('content')
<!-- Form to edit -->
<div class="row">
    <form class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <input id="task" name="task" type="text" class="validate" value="Task to edit">
                <label for="task">Edit task</label>
            </div>
            @include('todo.partials.coworkers')
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Edit task
            <i class="material-icons right">edit</i>
        </button>
    </form>
</div>
@endsection
