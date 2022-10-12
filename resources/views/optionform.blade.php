<form action="/option/store/{{ $id }}" method="post">
    @csrf
    <p><input type="text" name="name" placeholder="サービス名"></p>
    <p><input type="text" name="value" placeholder="値段"></p>
    <p><input type="submit" value="投稿"></p>
</form>

<hr>

@foreach($options as $option)
    <p>サービス：{{ $option->name }}</p>
    <p>値段：{{ $option->value }}</p>
    <form action="/option/update/{{ $option->id }}" method="post">
        @csrf
        <input type="submit" value="更新"> 
    </form>
    <form action="/option/delete/{{ $option->id }}" method="post">
        @csrf
        <input type="submit" value="削除"> 
    </form>
@endforeach
