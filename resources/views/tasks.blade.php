@extends('layout')

@section('content')

    <h1>Task List</h1>
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
                    <option value="1" >赤色</option>
                    <option value="2" >青色</option>
                    <option value="3" >黄色</option>
                    <option value="4" >緑色</option>
                </select> 
            </div>
        </div>
        
        <div class="form-group">
        <label for="category" class="col-sm-3control-label">category</label>    
            <div class="col-sm-6">
                <select name="category">
                    <option value="1" >訓練</option>
                    <option value="2" >車両</option>
                    <option value="3" >団</option>
                    <option value="4" >水利</option>
                </select> 
            </div>
        </div>
        
        <div class="form-group">
        <label for="limit" class="col-sm-3control-label">limit</label>    
            <div class="col-sm-6">
                <input name="limit" type="date">
            </div>
        </div>
        
        <!-- Add Task Button -->
        
        <div class="form-group">
            
            <div class="col-sm-offset-3 col-sm-6">
                
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Task
                </button>
                
            </div>
            
        </div>
        
    </form>
    @endguest
    <!-- Current Tasks -->
    <!--タスクの一覧表示-->
    <h2>Current Tasks</h2>
    
    <table class="table table-striped task-table">
        <thead>
            <th>Task</th><th>&nbsp;</th>
        </thead>
        
        <tbody>
            @foreach ($tasks as $task)
            
                <tr>
                    <!-- Task name -->
                    
                    <td>
                        <!--タスクのnameプロパティを取得することでDBのnameカラムの値を表示する-->
                        <div>{{ $task->name }}</div>
                    </td>
                    
                    <td>
                        <form action="/tasks/{{ $task->id }}" method="POST"/>
                            {{ csrf_field() }}
                            
                            <!--擬似的にdeleteメソッドとして呼び出している-->
                            {{ method_field('DELETE') }}
                            
                            <button>Delete Task</button>
                        </form>
                    </td>
                    
                </tr>
                
            @endforeach
        </tbody>
        
    </table>
@endsection