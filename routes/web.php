<?php

use App\Http\Requests\TaskRequest;
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
        'tasks'=> Task::latest()->paginate()
    ]);
})->name("tasks.index");


// Get Item
Route::get("/tasks/{task}", function(Task $task){
    return view("show", [
        'task'=> $task
    ]);
})->name("tasks.show");


// Insert
Route::post("/tasks", function(TaskRequest $request) {
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show',['task'=> $task->id])
        ->with('success','Task created successfully!');
})->name("tasks.store");


// Edit URL
Route::get("/tasks/{task}/edit", function(Task $task){
    return view('edit', [
        'task'=> $task
    ]);
})->name("tasks.edit");


// Edit
Route::put("/tasks/{task}", function(Task $task, TaskRequest $request) {
    $task->update($request->validated());

    return redirect()->route('tasks.show',['task'=> $task->id])
        ->with('success','Task Updated successfully!');
})->name("tasks.update");


// Delete
Route::delete("/tasks/{task}", function(Task $task){
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success','Task Deleted successfully!');
})->name("tasks.destroy");

// Toggle Complete
Route::put("/tasks/{task}/toggle-complete", function(Task $task){
    $task->toggleCompleted();

    return redirect()->back()->with('success','Task Updated successfully!');
})->name('tasks.toggle-complete');

// 4. Fallback
Route::fallback(function(){
    return "There is no such page.";
});
