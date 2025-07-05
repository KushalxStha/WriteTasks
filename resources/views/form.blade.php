@extends('layout.app')

@section('style')
<style>

</style>
@endsection

@section('title', isset($task) ? "Edit Task":"Add Task")

@section('content')
    <form method="post" action="{{ isset($task)? route('tasks.update',['task'=> $task->id]) : route('tasks.store') }}">
    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
        @error('title')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
        @error('description')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="long_description">Title</label>
        <textarea type="text" name="long_description" id="long_description" rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
        @error('long_description')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit">{{ isset($task)? "Edit Task" : "Add Task" }}</button>
    </div>
    </form>
@endsection
