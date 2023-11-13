<?php

namespace App\Http\Controllers;


use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        return view('index', [
            'tasks' => Task::latest()->paginate(10)
        ]);
    }

    public function createTask() {
        return view('create');
    }

    public function storeTask(TaskRequest $request) {
        $task = Task::create($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task created!');
    }

    public function updateTask(Task $task, TaskRequest $request) {
        $task->update($request->validated());
        return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated!');
    }

    public function showTask(Task $task) {
        return view('task', [
            'task' => $task
        ]);
    }

    public function editTask(Task $task) {
        return view('edit', ['task' => $task]);
    }

    public function destroyTask(Task $task) {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }

    public function refreshTasks(Task $task) {
        Task::truncate();
        return redirect()->route('tasks.index');
    }

    public function toggleTask(Task $task) {
        $task->toggleComplete();
        return redirect()->back()->with('success', 'Task updated!');
    }

}
