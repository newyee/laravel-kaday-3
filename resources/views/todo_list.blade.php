<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <title>TodoList</title>
</head>
<body>
    <h3>ToDoリスト</h3>
    <input type="radio" id="all" name="todoList" value="1">
    <label for="all">すべて</label>
    <input type="radio" id="work" name="todoList" value="2">
    <label for="work">作業中</label>
    <input type="radio" id="complete" name="todoList" value="3">
    <label for="complete">完了</label>

    @isset($tasks)
    <table>
        <thead>
            <th>ID</th>
            <th>コメント</th>
            <th>状態</th>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->comment }}</td>
                <td>
                    <button type="submit">@if($task->state === 2) 完了 @else 作業中 @endif</button>
                </td>
                <form action="{{ route('destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <td><button type="submit">削除</button></td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endisset

    <h3>新規タスクの追加</h3>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <input type="text" name="comment">
        <input type="submit">
    </form>
    @error('comment')
        <p class="error"> {{ $message }} </p>
    @enderror

</body>
</html>


