@extends('layout.main')
@section('content')
<!-- <?php var_dump($product)?> -->
    <table>
        <tr>
            <td>Id</td>
            <td>Tên sản phẩm</td>
            <td>Giá</td>
        </tr>
        @foreach ($product as $pr)
        <tr>
            <td>{{$pr->id}}</td>
            <td>{{$pr->productName}}</td>
            <td>{{$pr->price}}</td>
            <td>
            <a href="{{route('edit-product/'.$pr->id)}}">Sửa</a>
            <a href="{{route('delete-product/'.$pr->id)}}">Xóa</a>
            </td>
        </tr>
        @endforeach
    </table>
    <a href="{{route('add-product')}}">Xóa</a>

@endsection
