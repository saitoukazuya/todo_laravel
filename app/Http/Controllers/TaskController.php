<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    //  一覧表示させる目的
    public function index()
    {
        // TaskモデルのTask:all()メソッドを呼び出し、全てのタスクをDBから取得する
        $tasks = Task::all();
        
        // 'tasks'はファイル名、[]の中は連想配列で、['キー'=>$tasks]となっている
        // $tasksでタスク一覧が表示できる
        return view('tasks', ['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
     // タスクの追加、保存を行う目的
    public function store(Request $request)
    {
        //Taskオブジェクト作成
        $task = new Task;
        
        // nameプロパティにフォームから送信されたnameパラメータを設定する
        $task->name = request('name');
        // データベースに保存する
        $task->save();
        
        // 次回はマイグレーションファイルを変更したところを追記する
        
        
        
        
        
        // '/tasks'にリダイレクトして一覧表示を行う
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     
     
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     
     
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     
     
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     
    //  削除する目的
    public function destroy(Request $request, $id, Task $task)
    {
        // モデルのTask::find()メソッドを呼び出して、タスクID($id)に対応するオブジェクトを取得する
        $task = Task::find($id);
        // 削除する
        $task->delete();
        // リダイレクトする
        return redirect('/tasks');
    }
}
