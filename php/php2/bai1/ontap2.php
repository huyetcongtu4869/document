<?php
function hienthi($a, $b, $c)
{
    echo $a + $b + $c;
}
// hienthi(2, 3, 4);
function infosv($hoten="Nguyễn Mạnh Huy", $masv="ph23124", $namsinh=2003, $email="huy@gmail.com")
{
    echo $hoten . "-" . $masv . "-".(getdate()['year']-$namsinh)."-".$email;
}
infosv();
