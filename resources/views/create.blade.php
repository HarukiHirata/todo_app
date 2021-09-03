@extends('layouts.app')

@section('content1')
<div class="card">
    <div class="card-header">タスク一覧（タスク名を押すと編集）</div>
    <div class="card-body">
        @foreach ($tasks as $task)
            <a href="/edit/{{ $task['id'] }}" class="card-text d-block">{{ $task['content'] }}</a>
            <div class="card-text">期限：{{ $task['deadline_date'] }}&nbsp;{{ $task['deadline_time'] }}</div>
            <div class="card-body py-0">
                <form action="{{ route('destroy') }}" method="POST">
                    @csrf
                    <input type="hidden" name="task_id" value="{{ $task['id'] }}" />
                    <button type="submit" class="btn btn-danger" onclick="return confirm('削除してよろしいですか')">削除</button>
                </form>
            </div>
            <div class="my-4"></div>
        @endforeach
    </div>
</div>
@endsection

@section('content2')
<div class="card">
    <div class="card-header">新規タスク作成</div>
    <form class="card-body" action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="内容を入力">{{ old('content') }}</textarea>
        </div>
        @error('content')
            <div class="alert alert-danger">内容の項目が空になっています。</div>
        @enderror
        <p>期限</p>
        <div class="form-group">
            <input type="date" class="form-control" name="deadline_date" rows="3" placeholder="" value="{{ old('deadline_date') }}">
        </div>
        @error('deadline_date')
            <div class="alert alert-danger">期限の項目が空になっています。</div>
        @enderror
        <div class="form-group">
            <input type="time" class="form-control" name="deadline_time" rows="3" placeholder="" value="{{ old('deadline_time') }}">
        </div>
        @error('deadline_time')
            <div class="alert alert-danger">期限の項目が空になっています。</div>
        @enderror
        <button type="submit" class="btn btn-primary">保存</button>
    </form>
</div>
@endsection
