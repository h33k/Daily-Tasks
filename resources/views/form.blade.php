@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add task')

@section('content')
    <form method='POST' action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="pb-2">
            <label for="title">
                Title
            </label>
            <input class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" type="text" name="title" id="title" maxlength="50" value="{{ $task->title ?? old('title') }}">
            @error('title')
            <p class="text-yellow-800 mb-3 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="pb-2">
            <label for="description">Description</label>
            <textarea class="block p-2.5 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" name="description" id="description" rows="7" maxlength="420">{{ $task->description ?? old('description') }}</textarea>

            @error('description')
            <p class="text-yellow-800 mb-3 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="pb-2"></div>
        <label for="priority">Priority</label>
        <ul class="items-center w-full bg-white border border-gray-200 rounded-lg sm:flex">
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                <div class="flex items-center ps-3">
                    <input checked id="radio_default" type="radio" value="1" name="priority" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                    <label for="radio_default" class="w-full py-3 ms-2 text-sm font-medium">Default </label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                <div class="flex items-center ps-3">
                    <input id="radio_important" type="radio" value="2" name="priority" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                    <label for="radio_important" class="w-full py-3 ms-2 text-sm font-medium">Important </label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                <div class="flex items-center ps-3">
                    <input id="radio_urgent" type="radio" value="3" name="priority" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                    <label for="radio_urgent" class="w-full py-3 ms-2 text-sm font-medium">Urgent </label>
                </div>
            </li>
        </ul>

        <div class="flex pt-5 gap-2">
            @isset($task)
                <a class="bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-lg px-10 py-2.5 me-2 mb-2" href="/tasks/{{ $task->id }}">
                    ↩︎
                </a>
            @else
                <a class="bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-lg px-10 py-2.5 me-2 mb-2" href="{{ route('tasks.index') }}">
                    ↩︎
                </a>
            @endisset
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-5 py-2.5 me-2 mb-2" type="submit">
                @isset($task)
                    Edit Task
                @else
                    Add Task
                @endisset
            </button>
        </div>
    </form>
@endsection
