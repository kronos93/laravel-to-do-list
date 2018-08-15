@isUserAdmin
<div class="input-field col s6">
    <select name="assignedTo">
        <option value="" disabled selected>Assigned to:</option>
        <option value="{{ Auth::user()->id }}">To myself</option>
        @foreach($coworkers as $coworker)
            @if($coworker->worker->id === $task->user->id)
                <option selected value="{{ $coworker->worker->id }}"> {{ $coworker->worker->name }}</option>
            @else
                <option value="{{ $coworker->worker->id }}"> {{ $coworker->worker->name }}</option>
            @endif
        @endforeach
    </select>
    <label>Assigned tasks:</label>
</div>
@endisUserAdmin
