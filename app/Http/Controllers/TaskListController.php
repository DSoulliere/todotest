<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Task};
use Illuminate\Support\Facades\Gate;

class TaskListController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {

        if (auth()->user()->role->name === 'administrator') {
            $tasks = $user->tasks()->withTrashed()->get();
            return view('user-tasks')->with(compact('tasks'));
        } else {
            return abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-task');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user = auth()->user();

        $user->tasks()->create(['name' => $request->name]);

        return redirect('/dashboard')->with('status', 'Your task has been created.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('use', $task);
        $task->is_complete = true;
        $task->save();
        return redirect('/dashboard')->with('status', 'Your task is now complete.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $this->authorize('use', $task);
        $task->delete();
        return redirect('/dashboard')->with('status', 'Your task has been deleted.');
    }
}
