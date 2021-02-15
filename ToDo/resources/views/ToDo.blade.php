
<!DOCTYPE html>
<html>
    <head>
        <title>toDoList</title>
        <link rel="stylesheet" href="{{ asset('/css/index.css') }}">   
    </head>
    <body>
        <div class="container">
            <h1>ToDoリスト</h1>
                <div class="filtering_radio">
                    <label><input type="radio" name="select" value="0" onclick="filtering();" checked>すべて</label>
                    <label><input type="radio" name="select" value="1" onclick="filtering();">作業中</label>
                    <label><input type="radio" name="select" value="2" onclick="filtering();">完了</label>
                </div>
            <div class="contents">
                <table class="table" border=1>
                    <tr><th>ID</th><th>コメント</th><th>状態</th></tr>
                    @foreach ($items as $item) 
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->comment}}</td>
                            <td>
                                @if ($item->state === 0)
                                <form class="working_state_Form" action="{{ url('todo/'.$item->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="state_btn" name="state" value="作業中">作業中</button>
                                    <input type="hidden" name='state' class="state" value="1">
                                </form>
                                @else
                                <form class="done_state_Form" action="{{ url('todo/'.$item->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="state_btn" name="state" value="完了">完了</button>
                                    <input type="hidden" name='state' class="state" value="0">
                                </form>
                                @endif
                                <form class="contents_Form" action="{{ url('todo/'.$item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete_btn" name="delete">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="add_task">
                <h1>新規タスクの追加</h1>
                <form class="commentAdd_Form" action="todo" method="post">
                    @csrf
                    <input type='text' name='comment' class="comment" value="">
                    <button type="submit" class="add_btn">追加</button>
                </form>
            </div>
        </div>
    </body>
</html>