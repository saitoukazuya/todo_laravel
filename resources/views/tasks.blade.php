@extends('layout')

@section('content')
    <div class='container'>
        <h1>Task List</h1>
        <div>
            <a href='/' class='btn btn-primary'>Topへ</a>
            <a href='/create' class='btn btn-info'>Createへ</a>
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
                    @error('name')
                    <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="color" class="col-sm-3control-label">color</label>    
                <div class="col-sm-6">
                    @error('color')
                    <span class="text-danger">{{ $message }}</span><br>
                    @enderror
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
                    @error('category')
                    <span class="text-danger">{{ $message }}</span><br>
                    @enderror
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
                    @error('limit')
                    <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                    <input name="limit" type="date">
                </div>
            </div>
            <!--詳細を書き入れる部分-->
            <div class="form-group">
                <label for="details" class="col-sm-3control-label">詳細内容</label>
                <div class="col-sm-3">
                    
                    <input type="textarea" name="details"/ class="form-control">
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
        <div class="col-sm-8" style="padding:10px 0px; padding-left: 0px">
            <form class="form-inline" action="/search" method="get">
                <div class="form-group">
                    <input type="text" name="name" value="{{ $keyword }}" class="form-control">
                </div>
                <div class="form-group" style="padding-left: 20px;">
                    <input type="submit" class="btn btn-info" value="Search">
                </div>
                <div class="form-group" style="padding-left: 20px;">
                    <button type='submit' class="btn btn-outline-info">
                    <a href={{ route('tasks') }}>クリア</a>
                </div>
            </form>
        </div>
        @endguest
        <!-- Current Tasks -->
        <!--タスクの一覧表示-->
        <h2>Current Tasks</h2>
        <table class="table table-striped table-hover col-sm-12">
            <tbody>
                @foreach ($tasks as $task)
                    <tr class="d-flex">
                        <!-- Task name -->
                        <td class="col-md-9">
                            <!--タスクのnameプロパティを取得することでDBのnameカラムの値を表示する-->
                            <div>{{ $task->name }}</div>
                        </td>
                        <td class="col-md-1">
                            <a href='/tasks/{{ $task->id }}' class='btn btn-primary float-right'>詳細</a>
                        </td>
                        <td class="col-md-1">
                            <a href="/edit/{{ $task->id }}" class='btn btn-outline-primary float-right'>編集</a>
                        </td>
                        <td class="col-md-1">
                            <form action="/tasks/{{ $task->id }}" method="POST"/>
                                {{ csrf_field() }}
                                <!--擬似的にdeleteメソッドとして呼び出している-->
                                {{ method_field('DELETE') }}
                                <button type="button" class='btn btn-outline-danger float-right'>削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $tasks->links() }}

    
@endsection