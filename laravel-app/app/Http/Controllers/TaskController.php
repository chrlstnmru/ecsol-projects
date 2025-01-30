<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index() {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreTaskRequest $request) {
    info($request->title);
    Task::create([
      'title' => $request->title,
      'user_id' => Auth::id(),
    ]);

    return Redirect::route('dashboard')->with('status', 'task-created');
  }

  /**
   * Display the specified resource.
   */
  public function show(Task $task) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id) {
    $tasks = Task::where('user_id', Auth::id())->where('id', $id)->first();

    return view('task.edit', ['task' => $tasks]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateTaskRequest $request, string $taskId) {
    Task::where('id', $taskId)
      ->where('user_id', Auth::id())
      ->update([
        'title' => $request->title,
        'completed' => $request->has('completed'),
      ]);
    return Redirect::route('dashboard');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $taskId) {
    Task::where('user_id', Auth::id())->where('id', $taskId)->delete();
    return Redirect::route('dashboard')->with('status', 'task-deleted');
  }
}
