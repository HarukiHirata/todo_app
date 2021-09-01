<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
  public function index()
  {
      return view('create');
  }

  public function store(Request $request)
  {
      $task = new Task;
      $task->user_id = \Auth::id();
      $task->content = $request->content;
      $task->deadline = $request->deadline;
      $task->status = 0;

      $task->save();

      return redirect ( route('home') );
  }
}
