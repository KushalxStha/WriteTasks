@extends('layout.app')

@section('style')
<style>
    .err-msg{
        color: red;
    }
</style>
@endsection

@section('title', "Edit Task")

@section('content')
    <form method="POST" action="{{ route('tasks.update',['task'=> $task->id]) }}">
    @csrf
    @method("PUT")
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $task->title }}">
        @error('title')
            <p class="err-msg text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description" rows="5" value="{{ $task->description }}"></textarea>
        @error('description')
            <p class="err-msg">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="long_description">Title</label>
        <textarea type="text" name="long_description" id="long_description" rows="10" value="{{ $task->long_description }}"></textarea>
        @error('long_description')
            <p class="err-msg">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit">Edit Task</button>
    </div>
    </form>
@endsection
