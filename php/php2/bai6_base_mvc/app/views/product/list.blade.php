@extends('layout.main')
@section('content')
    <table>
        <tr>
            <td>Id</td>
            <td>Tên sản phẩm</td>
            <td>Giá</td>
        </tr>
        @foreach ($cate as $pr)
        <tr>
            <td>{{$pr->id}}</td>
            <td>{{$pr->productName}}</td>
            <td>{{$pr->price}}</td>
            <td>
            <a href="{{route('edit-product/'.$pr->id)}}">Sửa</a>
            <a href="">Xóa</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
