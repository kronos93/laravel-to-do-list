<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Task;
use App\User;
use App\Invitation;

class ToDoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $invitations = [];
        if(Auth::user()->is_admin) {
            $coworkers = Invitation::where('admin_id',Auth::user()->id)->where('accepted',1)->get();
            $invitations = Invitation::where('admin_id',Auth::user()->id)->where('accepted',0)->get();
            $tasks = Task::where('user_id', Auth::user()->id)->orWhere('admin_id',Auth::user()->admin_id)->orderBy('created_at', 'DESC')->paginate(5);
        } else{
            $tasks = Task::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(5);
            $coworkers = User::where('is_admin', 1)->get();
        }

        return view('todo.index', compact('tasks', 'coworkers','invitations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('body')) {
            $task = new Task();
            $task->body = $request->input('body');

            if(Auth::user()->is_admin) {
                if($request->input('assignedTo') == Auth::user()->id) {
                    Auth::user()->tasks()->save($task);
                } else if($request->input('assignedTo') !=  null) {
                    $task->user_id = $request->input('assignedTo');
                    $task->admin_id = Auth::user()->id;
                    $task->save();
                }
            } else {
                Auth::user()->tasks()->save($task);
            }


        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coworkers = [];
        $invitations = [];
        if(Auth::user()->is_admin){
            $coworkers = Invitation::where('admin_id',Auth::user()->id)->where('accepted',1)->get();
            $invitations = Invitation::where('admin_id',Auth::user()->id)->where('accepted',0)->get();
        }
        $task = Task::findOrFail($id);
        return view('todo.edit', compact('task', 'coworkers', 'invitations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back();
    }

    public function updateStatusTask(Task $task)
    {
        $task->complete = !$task->complete;
        $task->save();
        return redirect()->route('todo.index');
    }

    public function sendInvitation(Request $request)
    {
        if ((int) $request->input('user') > 0 &&
           !Invitation::where('worker_id', Auth::user()->id)->where('admin_id', $request->input('user'))->exists()) {
            $invitation = new Invitation();
            $invitation->worker_id = Auth::user()->id;
            $invitation->admin_id = $request->input('user');
            $invitation->save();
        }
        return redirect()->back();
    }

    public function acceptInvitation(Invitation $invitation) {
        $invitation->accepted = true;
        $invitation->save();

        return redirect()->back();
    }

    public function denyInvitation(Invitation $invitation) {
        $invitation->delete();
        return redirect()->back();
    }

    public function deleteCoworker(Invitation $invitation) {
        $invitation->delete();
        return redirect()->back();
    }
}
