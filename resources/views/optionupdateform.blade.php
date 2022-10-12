<form action="/option/store/{{ $id }}/{{ $op }}" method="post">
    @csrf
    <p><input type="text" name="name" placeholder="サービス名" value="{{ $option->name }}"></p>
    <p><input type="text" name="value" placeholder="値段" value="{{ $option->value }}"></p>
    <p><input type="submit" value="投稿"></p>
</form>
