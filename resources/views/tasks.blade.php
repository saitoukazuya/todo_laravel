@extends('layout')

@section('content')

    <h1>Task List</h1>
    <div>
    <form action="/" method="GET"/>
        <button>return top</button>
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
                    <option value="1" >-色を選択してください-</option>
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
                    <option value="1" >-カテゴリを選択してください-</option>
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
        
        <!-- Add Task Button -->
        
        <div class="form-group">
            
            <div class="col-sm-offset-3 col-sm-6">
                
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus">Add Task</i>
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