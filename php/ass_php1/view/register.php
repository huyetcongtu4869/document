<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../controller/save-register.php" method="post" enctype="multipart/form-data">
        <label for="">Mời bạn nhập tên</label><br>
        <input type="text" name="username"><br>
        <label for="">Password</label><br>
        <input type="password" name="password"><br>
        <label for="">Repassword</label><br>
        <input type="password" name="repassword"><br>
        <label for="">Avartar</label><br>
        <input id="file" type="file" name="avartar"><br>
        <div class="btn"><button type="submit">Đăng kí</button></div>
        <input type="text" name="level" value="1" hidden>
    </form>
</body>

</html>