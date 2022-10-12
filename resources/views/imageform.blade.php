<form action="/image/store/{{ $id }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" accept="image/png, image/jpeg">
    <input type="submit" value="投稿"> 
</form>

@foreach($images as $image)
    <img src="{{ Storage::url($image->image) }}">
    <p>{{ $image->image }}</p>
    <form action="/image/delete/{{ $image->id }}" method="post">
    @csrf
    <input type="submit" value="削除"> 
</form>
@endforeach