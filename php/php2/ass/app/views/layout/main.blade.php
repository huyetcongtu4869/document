<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title}}</title>
    @include('layout.style')
</head>

<body>
    <div class="container">
        <header>
            <div class="header-main">
                <ul class="menu">
                    <li><a href="{{route('product-list')}}">Quản lí sản phẩm</a></li>
                    <li><a href="{{route('category-list')}}">Quản lí danh mục</a></li>
                    <li><a href="{{route('user-list')}}">Quản lí người dùng</a></li>
                    <li><a href="{{route('service-list')}}">Quản lí chức vụ</a></li>
                    <li><a href="{{route('sale-list')}}">Quản lí nhân viên</a></li>
                </ul>
            </div>
        </header>
        <section class="content">
            @yield('content')
        </section>
        <footer><span>FPT</span></footer>
    </div>
</body>

</html>