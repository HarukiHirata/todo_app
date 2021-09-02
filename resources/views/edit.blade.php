@extends('layouts.app')

@section('content1')
<div class="card">
    <div class="card-header">
        Featured
    </div>
    <div class="card-body">
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    </div>
</div>
@endsection

@section('content2')
<div class="card">
    <div class="card-header">タスク一覧（タスク名を押すと編集）</div>
    <div class="card-body">
        @foreach ($tasks as $task)
            <a href="/edit/{{ $task['id'] }}" class="card-text d-block">{{ $task['content'] }}</a>
            <div class="card-text">期限：{{ $task['deadline_date'] }}&nbsp;{{ $task['deadline_time']}}</div>
            <a href="#" class="card-text d-block">完了にする</a>
            <div class="my-2"></div>
        @endforeach
    </div>
</div>
@endsection

@section('content3')
<div class="card">
    <div class="card-header">タスク編集</div>
    <form class="card-body" action="{{ route('update') }}" method="POST">
        @csrf
        <input type="hidden" name="task_id" value="{{ $edit_task['id'] }}" />
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="内容を入力">{{ $edit_task['content'] }}</textarea>
        </div>
        <p>期限</p>
        <div class="form-group">
            <input type="date" class="form-control" name="deadline_date" rows="3" placeholder="" value="{{ $edit_task['deadline_date'] }}">
        </div>
        <div class="form-group">
            <input type="time" class="form-control" name="deadline_time" rows="3" placeholder="" value="{{ $edit_task['deadline_time'] }}">
        </div>
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection
