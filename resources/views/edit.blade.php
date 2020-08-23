@extends('layout')
@section('title','リストの編集')

@section('content')
<div class='container'>
    
    <h1>タスク編集</h1>
    <div>
        <a href='/tasks' class='btn btn-primary'>Taks Listへ</a>
    </div>
    
    <form action="/tasks" method="POST" class="form-horizontal">
        
        {{ csrf_field() }}
        
        <div class="form-group">
            
        <label for="task" class="col-sm-3control-label">Task</label>
        
            <div class="col-sm-6">
                <!--入力ずみのタスク名を入力できるようにしている-->
                <input type="text" name="name" value="{{ $task->name }}" id="task-name" class="form-control">
            </div>
            
        </div>
        
        <div class="form-group">
        
        <label for="color" class="col-sm-3control-label">color</label>    
            <div class="col-sm-6">
                <!--選択した内容を残して表示させたい-->
                <select name="color">
                    <option value="" selected>-色を選択してください-</option>
                    <!--selectedと三項演算子を使う-->
                    <option value="1" {{ (old('color', $task->color) ==1) ? "selected" : "" }}>赤色</option>
                    <option value="2" {{ (old('color', $task->color) ==2) ? "selected" : "" }}>黄色</option>
                    <option value="3" {{ (old('color', $task->color) ==3) ? "selected" : "" }}>緑色</option>
                    <option value="4" {{ (old('color', $task->color) ==4) ? "selected" : "" }}>青色</option>
                </select> 
            </div>
        </div>
        
        <div class="form-group">
        <label for="category" class="col-sm-3control-label">category</label>    
            <div class="col-sm-6">
                <select name="category">
                    <option value="" >-カテゴリを選択してください-</option>
                    <option value="1" {{ (old('category', $task->category) ==1) ? "selected" : "" }}>重要</option>
                    <option value="2" {{ (old('category', $task->category) ==2) ? "selected" : "" }}>事務</option>
                    <option value="3" {{ (old('category', $task->category) ==3) ? "selected" : "" }}>作業</option>
                    <option value="4" {{ (old('category', $task->category) ==4) ? "selected" : "" }}>急務</option>
                </select> 
            </div>
        </div>
        
        <div class="form-group">
        <label for="limit" class="col-sm-3control-label">完了期限（入力またはカレンダーから選択）</label>    
            <div class="col-sm-6">
                <input name="limit" type="date" value="{{ $task->limit }}">
            </div>
        </div>
        
        <!--詳細を書き入れる部分-->
        <div class="form-group">
        <label for="details" class="col-sm-3control-label">詳細内容</label>
            <div class="col-sm-6">
                <input type="textarea" name="details"/>
            </div>
        </div>
        
        <!-- Edit Task Button -->
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="button" class='btn btn-outline-primary'>
                    <!--まだ送信できないので編集する-->
                    <i class="fa fa-plus">更新</i>
                </button>
            </div>
        </div>
        
    </form>
</div>