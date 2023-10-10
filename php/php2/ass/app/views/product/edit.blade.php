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
<form action="{{route('edit-product-post/'.$data->id)}}" method="POST">
    Tên sản phẩm <input type="text" name="productName" value="{{$data->productName}}"><br>
    Đơn giá <input type="text" name="price" value="{{$data->price}}"><br>
    Danh mục <select name="categoryName" value="{{$data->id}}">
        @foreach( $cate as $data1 )
        <option value="{{$data1->id}}" {{$data1->id== $data->categoryId ? 'selected' : ''}}>
            {{$data1->categoryName}}
        </option>
        @endforeach
    </select><br>
    Trạng thái <select name="status" value="{{$data->status}}">
        <option value="0">On</option>
        <option value="1">Off</option>
    </select><br>
    <input type="submit" name="sua" value="Sửa">
</form>

@endsection