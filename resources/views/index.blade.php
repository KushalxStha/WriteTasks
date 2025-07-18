@extends('layout.app')


@section('title', "The List of Tasks.")

@section('content')
    <nav class="mb-4">
        <a class="font-medium text-gray-700 underline decoration-pink-500" href="{{ route('tasks.create') }}">Add Task</a>
    </nav>

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route("tasks.show", ['task' => $task->id]) }}"
                @class(['line-through' => $task->completed])>{{ $task->title }}</a>
        </div>
    @empty
        <div>List is empty.</div>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
