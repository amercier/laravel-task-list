<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Task;

class TasksController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show Task Dashboard
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', $request->user()->id)
                     ->orderBy('created_at', 'asc')->get();
        return view('tasks', ['tasks' => $tasks]);
    }

    /**
     * Add New Task
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ['name' => 'required|max:255']
        );

        if ($validator->fails()) {
            return redirect('/')
            ->withInput()
            ->withErrors($validator);
        }

        $task = $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
}
