@extends('layout.main')
@section('content')
@if(isset($_SESSION['errors'])&& isset($_GET['msg']))
<ul>
    @foreach($_SESSION['errors'] as $error)
    <li style="color:red">{{ $error}}</li>
    @endforeach
</ul>
@endif
@if(isset($_SESSION['success']) && isset($_GET['msg']))
<span style="color:green;">{{ $_SESSION['success'] }}</span>
@endif
<form action="{{route('add-category-post')}}" method="post">
    Tên danh mục <input type="text" name="categoryName"><br>
    Trạng thái <select name="status">
        <option value="0">On</option>
        <option value="1">Off</option>
    </select><br>
    <input type="submit" name="them" value="Thêm">
</form>
@endsection