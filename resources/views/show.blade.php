@extends('layout.app')

@section('title', $task->title)

@section('content')

    <nav class="mb-4">
        <a href="{{ route('tasks.index') }}"
        class="font-medium text-gray-700 underline decoration-pink-500">← Go Back to the List</a>
    </nav>

    <P class="mb-4 text-slate-700">{{ $task->description }}</P>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">
    Created {{ $task->created_at->diffForHumans() }} . Updated {{ $task->updated_at->diffForHumans() }}
    </p>

    @if ($task->completed)
        <span class="font-medium text-green-500">Completed</span>
    @else
        <span class="font-medium text-red-500">Not Completed</span>
    @endif

    <div>
        <a href="{{ route('tasks.edit',['task'=> $task]) }}"
        class="px-2 py-1 text-center font-medium rounded-md shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Edit</a>
    </div>

    <div>
        <form method="POST" action="{{ route('tasks.toggle-complete', ['task'=> $task]) }}">
        @csrf
        @method('PUT')
        <button type="submit">
            Mark as {{ $task->completed ? 'not complete': 'complete' }}
        </button>
        </form>
    </div>

    <div>
        <form action="{{ route("tasks.destroy",['task'=> $task]) }}" method="POST">
        @csrf
        @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection
