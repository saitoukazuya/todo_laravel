@extends('layout')
@section('title','リストの編集')

@section('content')
    <h1>タスク編集</h1>
    <div>
        <form action="/tasks" method="GET">
            <button>Task Listへ</button>
            <!--<button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button>-->
        </form>
    </div>
    
    <div>
        <p>タスク名：{{ $task->name }} </p>
        <!--Taskモデルの関数を使用-->
        <p>カテゴリ：{{ $task->category_show() }}</p>
        <!--Taskモデルの関数を使用-->
        <p>色：{{ $task->color_show() }}</p>
        <p>期限：{{ $task->limit }}</p>
        <p>詳細：{{ $task->details }}</p>
    </div>

@endsection