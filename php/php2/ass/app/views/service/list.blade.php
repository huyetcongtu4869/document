@extends('layout.main')
@section('content')
<table>
    <tr>
        <td>Id</td>
        <td>Chức vụ</td>
    </tr>
    @foreach ($service as $data)
    <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->serviceName}}</td>
        <td>
            <a href="{{route('edit-service/'.$data->id)}}">Sửa</a>
            <a href="">Xóa</a>
        </td>
    </tr>
    @endforeach
</table>
<a href="{{route('add-service')}}">Thêm</a>

@endsection