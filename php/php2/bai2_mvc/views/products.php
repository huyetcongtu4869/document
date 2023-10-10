<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <td>ID</td>
            <td>Tên sản phẩm</td>
            <td>Giá</td>
        </tr>
        <?php foreach ($products as $key=>$value){?>
        <tr>
            <td><?=$value['id']?></td>
            <td><?=$value['productName']?></td>
            <td><?=$value['price']?></td>
        </tr>
        <?php }?>
    </table>
</body>

</html>