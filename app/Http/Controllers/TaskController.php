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
        $tasks = Task::all();
        return view('todo_list', compact('tasks'));
    }

    /**
     * 新規タスクの登録処理
     * @param App\Http\Requests\TaskRequest $requests
     * @return \Illuminate\View\View
     */

    public function store(TaskRequest $request)
    {
        //
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

    public function edit()
    {
        //
    }
}
