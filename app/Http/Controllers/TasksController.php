<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Task;
use App\Repositories\TaskRepository;

class TasksController extends Controller
{
    /**
     * The task repository instance.
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    /**
     * Show Task Dashboard
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('tasks', [
            'tasks' => $this->tasks->forUser($request->user())
        ]);
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
