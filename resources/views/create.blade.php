@extends('layout.app')

@section('title', "Add Task")

@section('content')
    <form method="post" action="{{ route('tasks.store') }}">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        @error('title')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description" rows="5"></textarea>
        @error('description')
            <p class="">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="long_description">Title</label>
        <textarea type="text" name="long_description" id="long_description" rows="10"></textarea>
        @error('long_description')
            <p class="">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit">Add Task</button>
    </div>
    </form>
@endsection
