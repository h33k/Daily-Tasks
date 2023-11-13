@extends('layouts.app')

@section('title')
    <h2>Daily Tasks. Hello!</h2>
@endsection

@section('content')
    <div class="mb-5 flex">
        <a href="{{ route('tasks.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Add Task</a>

        <form action="tasks/refresh" method="POST">
            @csrf
            @method('DELETE')
            <button data-popover-target="popover-refresh" class="bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" type="submit">Refresh Tasks</button>
            <div data-popover id="popover-refresh" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
                <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Refresh Tasks</h3>
                </div>
                <div class="px-3 py-2">
                    <p>Delete all tasks. Sure?</p>
                </div>
                <div data-popper-arrow></div>
            </div>
        </form>
    </div>

    @forelse ($tasks as $task)
        <div>
            @if($task->priority==2)
                <span class="inline-flex w-2 h-2 me-1 bg-yellow-300 rounded-full"></span>
            @elseif($task->priority>2)
                <span class="inline-flex w-2 h-2 me-1 bg-purple-500 rounded-full"></span>
            @endif

            <a class="hover:opacity-75 @if($task->completed) line-through opacity-50 @endif" href="{{ route('tasks.show', ['task' => $task->id]) }}">{{$task->title}}</a>
        </div>
    @empty
        <div>There are no tasks! ∪･ｪ･∪</div>
    @endforelse

    @if($tasks->count())
        <div>
            {{ $tasks->links() }}
        </div>
    @endif
@endsection
