<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('todo', compact('tasks'));
    }

    public function store(Request $request)
    {
        Task::create($request->validate([
            'name' => 'required|string|max:255',
        ]));

        return redirect()->route('tasks.index');
    }

    public function update(Task $task, Request $request)
    {
        $task->update(['completed' => $request->has('completed')]);

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
