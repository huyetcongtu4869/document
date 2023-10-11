@extends('templates.layout')
@section('content')
    <table>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Hình ảnh
            </td>
        </tr>
        @foreach ($studentCondition as $st)
            <tr>
                <td>{{ $st->id }}</td>
                <td>{{ $st->name }}</td>
                <td><img src="{{ $st->image ? '' . Storage::url($st->image) : '' }}" style="width: 300px" /></td>
                <td><a href="{{ route('route_demo_delete',['id'=>$st->id]) }}">Xóa</a></td>
            </tr>
        @endforeach
    </table>
@endsection
