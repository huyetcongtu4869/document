<?php
$a = 10; //số nguyên
$b = "FPT"; //chữ
$c = false; //boolean
//..
// echo $b.$a;
//mảng tuần tự
$mang = array(10, 9, 5, 8);
// echo $mang[2];
//mảng liên hợp key=>value
$manglh = ["A" => 10, "B" => 5, "C" => 8, "D" => 7];
// echo $manglh["D"];
// echo $manglh["A"];
// echo $manglh["B"];
$color = ["red" => "Màu đỏ", "green" => "màu xanh lá", "blue" => "màu xanh dương"];
$hs = [
    ["hoten" => "exia", "masv" => "dgsfgsdf", "tuoi" => 12],
    ["hoten" => "exia", "masv" => "dgsfgsdf", "tuoi" => 433],
    ["hoten" => "exia", "masv" => "dgsfgsdf", "tuoi" => 1]
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* table {} */
    </style>
</head>

<body>
    <table>
        <tr>
            <td>KEY</td>
            <td>VALUE</td>
        </tr>
        <?php foreach ($manglh as $key => $value) { ?>
            <tr>

                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>
        <?php } ?>
    </table>
    <table>
        <tr>
            <td>KEY</td>
            <td>VALUE</td>
        </tr>
        <?php foreach ($color as $key => $value) { ?>
            <tr>

                <td style="background-color:<?= $key ?> ;"><?= $key ?></td>
                <td style="background-color:<?= $key ?> ;"><?= $value ?></td>
            </tr>
        <?php } ?>
    </table>
    <table>
        <tr>
            <td>KEY</td>
            <td>VALUE</td>
        </tr>
        <?php foreach ($hs as $key => $value) { ?>
            <tr>

                <td style="background-color:<?= $key ?> ;"><?= $key ?></td>
                <td><?= $value["hoten"] ?><?= $value["hoten"] ?></td>
                <td><?= $value["hoten"] ?><?= $value["masv"] ?></td>
                <td style="background-color:<?= ($value["tuoi"] > 18) ? 'red' : (($value["tuoi"] == 12) ? 'blue' : '') ?> ;"><?= $value["tuoi"] ?>
                </td>
            </tr>
            
        <?php } ?>
    </table>
    
</body>

</html>