@extends('layout')

@section('content')
<h2>検索結果</h2>
    <table class="table table-striped table-hover">
        <thead>
            <th>Task</th><th>&nbsp;</th>
        </thead>
        
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <!-- Task name -->
                    <td>
                        <!--タスクのnameプロパティを取得することでDBのnameカラムの値を表示する-->
                        <!--ここにリンクを追加する予定　8月19日-->
                        <div>{{ $task->name }}</div>
                    </td>
                    <td>
                        <a href='/tasks/{{ $task->id }}' class='btn btn-primary'>詳細</a>
                    </td>
                    <td>
                        <a href="/edit/{{ $task->id }}" class='btn btn-outline-primary'>編集</a>
                    </td>
                    <td>
                        <form action="/tasks/{{ $task->id }}" method="POST"/>
                            {{ csrf_field() }}
                            <!--擬似的にdeleteメソッドとして呼び出している-->
                            {{ method_field('DELETE') }}
                            <button type="button" class="btn btn-primary">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection