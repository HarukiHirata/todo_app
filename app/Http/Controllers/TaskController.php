<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
  public function index()
  {
      $tasks = Task::select('tasks.*')
          ->where('user_id', '=', \Auth::id())
          ->where('status', '=', 0)
          ->orderBy('id', 'ASC')
          ->get();

      return view('create', compact('tasks'));
  }

  public function store(Request $request)
  {
      $request->validate([ 'content' => 'required' ]);
      $request->validate([ 'deadline_date' => 'required' ]);
      $request->validate([ 'deadline_time' => 'required' ]);
      $task = new Task;
      $task->user_id = \Auth::id();
      $task->content = $request->content;
      $task->deadline_date = $request->deadline_date;
      $task->deadline_time = $request->deadline_time;
      $task->status = 0;

      $task->save();

      return redirect ( route('home') );
  }

  public function edit($id)
  {
      $tasks = Task::select('tasks.*')
          ->where('user_id', '=', \Auth::id())
          ->where('status', '=', 0)
          ->orderBy('id', 'ASC')
          ->get();

      $edit_task = Task::find($id);

      return view('edit', compact('tasks', 'edit_task'));
  }

  public function update(Request $request)
  {
      $request->validate([ 'content' => 'required' ]);
      $request->validate([ 'deadline_date' => 'required' ]);
      $request->validate([ 'deadline_time' => 'required' ]);
      $task = Task::find($request->task_id);
      $task->user_id = \Auth::id();
      $task->content = $request->content;
      $task->deadline_date = $request->deadline_date;
      $task->deadline_time = $request->deadline_time;
      $task->status = 0;

      $task->save();

      return redirect ( route('home') );
  }

  public function destroy(Request $request)
  {
      $posts = $request->all();
      Task::where('id', $posts['task_id'])->update(['status' => 1]);
      return redirect ( route('home') );
  }
}
