<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = collect();
        $completed = $request->completed ?? null;
        if (! is_null($completed)) {
            $completed = (bool) $completed;
            $tasks = Task::where('isDone', $completed)->get();
            return view('Tasks.index', compact('tasks', 'completed'));

        }

        $tasks = Task::latest()->get();
        return view('Tasks.index', compact('tasks', 'completed'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable',
            'user_id' => 'required|exists:users,id'

        ]);

        Task::create($data);

        return redirect()->route('tasks.index');
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Task $task)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('Tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable',


        ]);

        $task->update($data);

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function toogle(Task $task)
    {
        $task->update([
            'isDone' => !$task->isDone
        ]);

        return redirect()->route('tasks.index');
    }

    // public function completed()
    // {
    //     $tasks = Task::where('isDone', true)->get();
    //     return view('Tasks.index', [
    //         'tasks' => $tasks,
    //         'filter' => 'completed'
    //     ]);
    // }

    // public function pending()
    // {
    //     $tasks = Task::where('isDone', false)->get();
    //     return view('Tasks.index', [
    //         'tasks' => $tasks,
    //         'filter' => 'pending'
    //     ]);
    // }
}
