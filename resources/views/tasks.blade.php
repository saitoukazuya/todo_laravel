@extends('layout')

@section('content')
    <div class='container'>
        <h1>Task List</h1>
        <div>
            <a href='/' class='btn btn-primary'>Topへ</a>
        </div>
        <!--タスク追加のためのフォーム-->
        @guest
        @else
        
        <form action="/tasks" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3control-label">Task</label>
                <div class="col-sm-6">
                    <!--タスクの名前を入力できるようにしている-->
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="color" class="col-sm-3control-label">color</label>    
                <div class="col-sm-6">
                    <select name="color">
                        <option value="" >-色を選択してください-</option>
                        <option value="1" >赤色</option>
                        <option value="2" >黄色</option>
                        <option value="3" >緑色</option>
                        <option value="4" >青色</option>
                    </select> 
                </div>
            </div>
            <div class="form-group">
            <label for="category" class="col-sm-3control-label">category</label>    
                <div class="col-sm-6">
                    <select name="category">
                        <option value="" >-カテゴリを選択してください-</option>
                        <option value="1" >重要</option>
                        <option value="2" >事務</option>
                        <option value="3" >作業</option>
                        <option value="4" >急務</option>
                    </select> 
                </div>
            </div>
            <div class="form-group">
            <label for="limit" class="col-sm-3control-label">完了期限（入力またはカレンダーから選択）</label>    
                <div class="col-sm-6">
                    <input name="limit" type="date">
                </div>
            </div>
            <!--詳細を書き入れる部分-->
            <div class="form-group">
            <label for="details" class="col-sm-3control-label">詳細内容</label>
                <div class="col-sm-6">
                    <input type="textarea" name="details"/>
                </div>
            </div>
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <!--submitにしないと送信できない-->
                    <button type="submit" class='btn btn-success'>
                        <i class="fa fa-plus">Add Task</i>
                    </button>
                </div>
            </div>
        </form>
        <!--まだサーチ機能は実装できていない-->
        <h2>Search Task</h2>
        <div class="col-sm-4" style="padding:20px 0px; padding-left: 0px">
            <form class="form-inline" action="{{ url('/tasks') }}">
                <div class="form-group">
                    <input type="text" name="keyword" value="{{ $keyword }}" class="form-control">
                </div>
                <div style="padding-left: 20px;">
                    <input type="submit" class="btn btn-info" value="Search">
                </div>
            </form>
        </div>
        @endguest
        <!-- Current Tasks -->
        <!--タスクの一覧表示-->
        <h2>Current Tasks</h2>
        
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
    </div>
@endsection