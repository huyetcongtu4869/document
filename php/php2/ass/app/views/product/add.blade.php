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
<form action="{{route('add-product-post')}}" method="post">
    Tên sản phẩm <input type="text" name="productName"><br>
    Đơn giá <input type="text" name="price"><br>
    Danh mục <select name="categoryName">
        @foreach( $cate as $data )
        <option value="{{$data->id}}" {{$data->id==0?'selected':''}}>
            {{$data->categoryName}}
        </option>
        @endforeach
    </select><br>
    Trạng thái <select name="status">
        <option value="0">On</option>
        <option value="1">Off</option>
    </select><br>
    <input type="submit" name="them" value="Thêm">
</form>
@endsection