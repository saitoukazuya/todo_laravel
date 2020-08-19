@extends('layout')

@section('content')
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
        <form action="/tasks" method="GET">
            <button>Task Listへ</button>
        </form>
    </div>
    
    
@endsection