@extends('layout')

@section('content')
    <div class='container'>
    <h1>Create Task</h1>
        <div>
            <a href='/' class='btn btn-primary'>Indexへ</a>
        </div>
        <!--タスク追加のためのフォーム-->
        @guest
        @else
        <form action="/tasks" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            @if(count($errors) > 0)
                <ul>
                    @foreach($errors as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
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
        @endguest
    </div>
@endsection