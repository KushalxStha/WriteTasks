<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get("/", function(){
    return redirect()->route("tasks.index");
});

// Insert URL
Route::get('/tasks/create', function() {
    return view('create');
})->name("tasks.create");

// Get all
Route::get("/tasks", function () {
    return view("index",[
        'tasks'=> Task::latest()->get()
    ]);
})->name("tasks.index");


// Get Item
Route::get("/tasks/{task}", function(Task $task){
    return view("show", [
        'task'=> $task
    ]);
})->name("tasks.show");


// Insert
Route::post("/tasks", function(Request $request) {
    $data = $request->validate([
        'title'=> 'required|max:255',
        'description' => 'required',
        'long_description'=> 'required'
    ]);

    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show',['id'=> $task->id])
        ->with('success','Task created successfully!');
})->name("tasks.store");


// Edit URL
Route::get("/tasks/{task}/edit", function(Task $task){
    return view('edit', [
        'task'=> $task
    ]);
})->name("tasks.edit");


// Edit
Route::put("/tasks/{task}", function(Task $task, Request $request) {
    $data = $request->validate([
        'title'=> 'required|max:255',
        'description' => 'required',
        'long_description'=> 'required'
    ]);

    // $task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show',['id'=> $task->id])
        ->with('success','Task Updated successfully!');
})->name("tasks.update");


// 4. Fallback
Route::fallback(function(){
    return "There is no such page.";
});
