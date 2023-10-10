@extends('layout.main')
@section('content')
<table>
    <tr>
        <td>Id</td>
        <td>Tên người dùng</td>
    </tr>
    @foreach ($user as $data1)
    <tr>
        <td>{{$data1->id}}</td>
        <td>{{$data1->userName}}</td>
        <td>
            <a href="{{route('edit-user/'.$data1->id)}}">Sửa</a>
            <a href="{{route('delete-user/'.$data1->id)}}">Xóa</a>
        </td>
    </tr>
    @endforeach
</table>
<a href="{{route('add-user')}}">Thêm</a>

@endsection