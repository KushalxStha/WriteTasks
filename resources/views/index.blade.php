@extends('layout.app')


@section('title', "The List of Tasks.")

@section('content')
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route("tasks.show", ['task' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>List is empty.</div>
    @endforelse

    @if ($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
