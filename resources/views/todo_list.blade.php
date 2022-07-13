<h3>ToDoリスト</h3>
<input type="radio" id="all" name="todoList" value="1">
<label for="all">すべて</label>
<input type="radio" id="work" name="todoList" value="2">
<label for="work">作業中</label>
<input type="radio" id="complete" name="todoList" value="3">
<label for="complete">完了</label>

@isset($todoLists)
<table>
    <thead>
        <th>ID</th>
        <th>コメント</th>
        <th>状態</th>
    </thead>
    <tbody>
        @foreach ($todoLists as $todo)
        <tr>
            <td>{{ $todo->id }}</td>
            <td>{{ $todo->comment }}</td>
            <td>
                <button type="submit">@if($todo->state) 完了 @else 作業中 @endif</button>
            </td>
            <td><button type="submit">削除</button></td>
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
