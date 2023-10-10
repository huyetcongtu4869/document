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
<form action="{{route('edit-service-post/'.$data->id)}}" method="POST">
    Tên chức vụ <input type="text" name="serviceName" value="{{$data->serviceName}}"><br>

    <input type="submit" name="sua" value="Sửa">
</form>
@endsection