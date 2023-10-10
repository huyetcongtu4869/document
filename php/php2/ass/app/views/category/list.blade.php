@extends('layout.main')
@section('content')
<table>
    <tr>
        <td>Id</td>
        <td>Tên danh mục</td>
    </tr>
    @foreach ($category as $cate)
    <tr>
        <td>{{$cate->id}}</td>
        <td>{{$cate->categoryName}}</td>
        <td>
            <a href="{{route('edit-category/'.$cate->id)}}">Sửa</a>
            @if ($cate->categoryName!="demo1")
            <a href="{{route('delete-category/'.$cate->id)}}">Xóa</a>
            @endif
        </td>
    </tr>
    @endforeach
</table>
<a href="{{route('add-category')}}">Thêm</a>

@endsection