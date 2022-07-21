<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

use App\Models\Task;

class TaskController extends Controller
{
    /**
     * タスク一覧及び登録画面を表示
     *
     * @return \Illuminate\View\View
     */

    public function create()
    {
        $all = Task::all();
        $working = Task::where('state', 1)->get();
        $complete = Task::where('state', 2)->get();
        session(['status' => 1]);
        return view('todo_list', compact('all', 'working', 'complete'));
    }

    /**
     * 新規タスクの登録処理
     * @param App\Http\Requests\TaskRequest $requests
     * @return \Illuminate\View\View
     */

    public function store(TaskRequest $request)
    {
        // 1 == 作業中
        $state = 1;
        $comment = $request->input('comment');
        Task::create([
            'comment' => $comment,
            'state' => $state
        ]);
        return redirect()->route('tasks.create');
    }

    /**
     * 新規タスクの登録処理
     * @param int  $id
     * @return \Illuminate\View\View
     */

    public function destroy($id)
    {
        $deleteTask = Task::find($id);
        $deleteTask->delete();
        return redirect()->route('tasks.create');
    }

    /**
     * タスクのステータス更新処理
     * @param int  $id
     * @return \Illuminate\View\View
     */

    public function update($id)
    {
        $updateTask = Task::find($id);
        if($updateTask->state == 1 ){
            $updateTask->state = 2;
        }else{
            $updateTask->state = 1;
        }
        $updateTask->save();
        return redirect()->route('tasks.create');
    }

    public function changeTask(Request $request) {
        if($request->todoList === 1) {
            session(['status' => 1]);
        }else if($request->todoList === 2){
            session(['status' => 2]);
        }else{
            session(['status' => 3]);
        }
        return response()->json(['success'=>$request->todoList]);
    }
}
