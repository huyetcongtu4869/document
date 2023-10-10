@extends('layout.main')
@section('content')
<table>
    <tr>
        <td>Id</td>
        <td>Tên nhân viên</td>
        <td>Giá</td>
    </tr>
    @foreach ($sale as $data)
    <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->service}}</td>
        <td>
            <a href="{{route('edit-sale/'.$data->id)}}">Sửa</a>
            <a href="{{route('delete-sale/'.$data->id)}}">Xóa</a>
        </td>
    </tr>
    @endforeach
</table>
<a href="{{route('add-sale/')}}">Thêm</a>

@endsection