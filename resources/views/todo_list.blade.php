<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <title>TodoList</title>
</head>
<body>
    <h3>ToDoリスト</h3>
    <form data-action="{{ route('change') }}" method="post" id="task-change-form">
        @csrf
      <input type="radio" id="all" name="todoList" value="1">
      <label for="all">すべて</label>
      <input type="radio" id="work" name="todoList" value="2">
      <label for="work">作業中</label>
      <input type="radio" id="complete" name="todoList" value="3">
      <label for="complete">完了</label>
    </form>
    @isset($all)
    <table>
        <thead>
            <th>ID</th>
            <th>コメント</th>
            <th>状態</th>
        </thead>
        <tbody>
            @if(session('status') === 1)
                @foreach ($all as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->comment }}</td>
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <td>
                            <button type="submit">@if($task->state === 2) 完了 @else 作業中 @endif</button>
                        </td>
                    </form>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <td><button type="submit">削除</button></td>
                    </form>
                </tr>
                @endforeach
            @elseif(session('status') === 2)
                @foreach ($working as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->comment }}</td>
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <td>
                            <button type="submit">@if($task->state === 2) 完了 @else 作業中 @endif</button>
                        </td>
                    </form>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <td><button type="submit">削除</button></td>
                    </form>
                </tr>
                @endforeach
            @else
                @foreach ($complete as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->comment }}</td>
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <td>
                            <button type="submit">@if($task->state === 2) 完了 @else 作業中 @endif</button>
                        </td>
                    </form>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <td><button type="submit">削除</button></td>
                    </form>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    @endisset

    <h3>新規タスクの追加</h3>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="comment">
        <input type="submit">
    </form>
    @error('comment')
        <p class="error"> {{ $message }} </p>
    @enderror
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/change-task-list.js') }}" defer></script>
</body>
</html>
