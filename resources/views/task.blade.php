@extends('layouts.app')

@section('title')
    @if($task->priority==2)
        <span class="inline-flex w-2 h-2 me-1 mb-2 bg-yellow-300 rounded-full"></span>
    @elseif($task->priority>2)
        <span class="inline-flex w-2 h-2 me-1 mb-2 bg-purple-500 rounded-full"></span>
    @endif
    <h3 class="inline break-all">{{ $task->title }}</h3>
@endsection

@section('content')
    <p class="my-2 break-all">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="my-2 break-all"><span class="underline">Note:</span><br>{{ $task->long_description }}</p>
    @endif

    <span class="mt-2 bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500 ">
    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
    </svg>
    Created at: {{ $task->created_at }}
    </span>
    <br>
    <span class="mt-2 bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500 ">
    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
    </svg>
    Updated at: {{ $task->updated_at }}
    </span>

    @if($task->completed)
        <p class="mt-4 max-w-min bg-green-100 text-green-800 me-2 px-3.5 py-2.5 rounded-full">Completed</p>
    @else
        <p class="mt-4 max-w-min whitespace-nowrap bg-purple-100 text-purple-800 me-2 px-3.5 py-2.5 rounded-full">In progress</p>
    @endif

    <div class="flex gap-2 mt-10">
        <a class="bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-lg px-10 py-2.5 me-2 mb-2" href="{{ route('tasks.index') }}">
            ↩︎
        </a>
        <a class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-5 py-2.5 mb-2" href="{{ route('tasks.edit', ['task' => $task->id]) }}">
            Edit
        </a>
        <div>
            <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
                @csrf
                @method('PUT')

                @if($task->completed)
                    <button class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 rounded-lg px-5 py-2.5 mb-2" type="submit">
                        Mark as not completed
                    </button>
                @else
                    <button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 rounded-lg px-5 py-2.5 mb-2" type="submit">
                        Mark as completed
                    </button>
                @endif
            </form>
        </div>
        <div>
            <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-lg px-5 py-2.5 mb-2" type="submit">
                    <svg class="text-white"
                         xmlns="http://www.w3.org/2000/svg" width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="3 6 5 6 21 6" />  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                    </svg>

                </button>
            </form>
        </div>
    </div>

@endsection
