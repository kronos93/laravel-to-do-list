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
@endsection
