<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    //  一覧表示させる目的
    public function index(Request $request)
    {
        // TaskモデルのTask:all()メソッドを呼び出し、全てのタスクをDBから取得する
        // $tasks = Task::all();
        // 'tasks'はファイル名、[]の中は連想配列で、['キー'=>$tasks]となっている
        // $tasksでタスク一覧が表示できる

        // 検索機能
        // 次は検索した内容を表示させる
        
        $keyword = $request->name;
        if($keyword != "")
        {
            $tasks = Task::where('name','like','%'.$keyword.'%')->paginate(100);
        } else {
            $keyword = '';
            $tasks = Task::paginate(8);
        }
        return view('tasks', ['tasks'=>$tasks, 'keyword'=>$keyword]);
        
    }
    
    // 追記していく
    public function create(Request $request)
    {
        // dd($request);
        $this->validate($request, Task::$task);
        
        $task = new Task;
        $tasks = $request->all();
        
        unset($tasks[__token]);
        
        
        // データベースに保存する
        $task->fill($tasks);
        $task->save();

        // '/tasks'にリダイレクトして一覧表示を行う
        return redirect('/tasks');
    }
    
    
    

     // タスクの追加、保存を行う目的
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, Task::$task);
        
        $task = new Task;
        
        // nameプロパティにフォームから送信されたnameパラメータを設定する
        $task->name = request('name');
        $task->category = request('category');
        $task->color = request('color');
        $task->limit = request('limit');
        $task->user_id = Auth::user()->id;
        $task->details = request('details');
        // データベースに保存する
        $task->save();

        // '/tasks'にリダイレクトして一覧表示を行う
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     
     
    public function show($id)
    {
        $task = Task::find($id);
        
        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     
     
    public function edit($id)
    {
        $task = Task::find($id);
        if (empty($task)) {
            abort(404);
        }
        return view('edit', ['task' => $task]);
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
        $this->validate($request, Task::$task);
        
        $task = Task::find($request->id);
        // ユーザーから送られてきたデータ全て
        $task_form = $request->all();
        // 
        unset($task_form['_token']);
        
        $task->fill($task_form)->save();
        return redirect('/tasks');
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
