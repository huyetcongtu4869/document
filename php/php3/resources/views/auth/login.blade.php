@extends('templates.layout')
@section('content')
<form action="" method="post">
@csrf
<form action="{{ route('login') }}" method="POST">
    <div class="mb-3">
        <label  class="form-label">Email address</label>
        <input type="email" name="email" class="form-control"  >
    </div>
    <div class="mb-3">
        <label  class="form-label">Password </label>
        <input type="password" name="password" class="form-control" >
    </div>
    <button type="submit">Login</button>
    </form>    
</form>    
@endsection