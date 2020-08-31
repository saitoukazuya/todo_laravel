@extends('layout')

@section('content')
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
        
        <a href="/tasks" class="btn btn-dark">Task Listへ</a>
        
    </div>
@endsection