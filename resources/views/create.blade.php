@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">新規タスク作成</div>
    <form class="card-body" action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="内容を入力"></textarea>
        </div>
        <div class="form-group">
            <input type="datetime-local" class="form-control" name="deadline" rows="3" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary">保存</button>
    </form>
</div>
@endsection
