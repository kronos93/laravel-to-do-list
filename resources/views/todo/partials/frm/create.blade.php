<div class="row">
    <form class="col s12" method="POST" action="{{ route('todo.store') }}">
        @csrf
        <div class="row">
            <div class="input-field col s6">
                <input id="body" name="body" type="text" class="validate" required>
                <label for="body">New task</label>
            </div>
            @include('todo.partials.coworkers')
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Create task
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
