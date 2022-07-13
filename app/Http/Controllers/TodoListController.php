<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TodoList;

class TodoListController extends Controller
{
    /**
     * タスク一覧及び登録画面を表示
     *
     * @return \Illuminate\View\View
     */

    public function create()
    {
        //
        $todoLists = TodoList::all();
        return view('todo_list', compact('todoLists'));
    }

    /**
     * 新規タスクの登録処理
     *@param Illuminate\Http\Request $requests
     * @return \Illuminate\View\View
     */

    public function store(Request $request)
    {
        //
        $state = 0;
        $comment = $request->input('comment');
        TodoList::create([
            'comment' => $comment,
            'state' => $state
        ]);

        return redirect()->route('create');
    }

    public function destroy()
    {
        //
    }

    public function edit()
    {
        //
    }
}
