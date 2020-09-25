@extends('layout')

@section('content')
<div class="container">
    <div class="starter-template rounded shadow-lg">
        <h1>タスク詳細ページ</h1>
        <div>
            <p>タスク名：{{ $task->name }} </p>
            <!--Taskモデルの関数を使用-->
            <p>カテゴリ：{{ $task->category_show() }}</p>
            <!--Taskモデルの関数を使用-->
            <p>色：{{ $task->color_show() }}</p>
            <p>期限：{{ $task->limit }}</p>
            
            <p>詳細：{{ $task->details }}</p>
        </div>
        <div>
        <a href="/tasks" class="btn btn-info">Task Listへ</a>
        </div>
    </div>
</div>
@endsection