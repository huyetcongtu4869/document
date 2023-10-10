<?php
//Bài 1
class Person
{
    public $ten;
    public $gioiTinh;
    public $diaChi;
    public $ngaySinh;
}
class Student extends Person
{
    public $maSv;
    public $dtb;
    public $email;
    public function __construct($ten, $gioiTinh, $diaChi, $ngaySinh, $maSv, $dtb, $email)
    {
        $this->ten = $ten;
        $this->gioiTinh = $gioiTinh;
        $this->diaChi = $diaChi;
        $this->ngaySinh = $ngaySinh;
        $this->maSv = $maSv;
        $this->dtb = $dtb;
        $this->email = $email;
        echo "Tên: " . $this->ten . " || Giới tính: " . $this->gioiTinh . " || Địa chỉ: " . $this->diaChi .
            " || Ngày sinh: " . $this->ngaySinh . " || Mã SV: " . $this->maSv .
            " || Điểm TB: " . $this->dtb . "=>" . ($this->dtb > 8 ? "Được học bổng" : "Không được học bổng") . " || Email: " . $this->email;
    }
}


//Bài 2
class ToanHoc
{
    public $so1;
    public $so2;
    public $number;

    public function tong()
    {
        return $this->so1 + $this->so2;
    }
    public function hieu()
    {
        return $this->so1 - $this->so2;
    }
    public function tich()
    {
        return $this->so1 * $this->so2;
    }
    public function thuong()
    {
        return $this->so1 / $this->so2;
    }
    public function mu()
    {
        return ($this->so1 + $this->so2) * 2;
    }
    public function ktSoNT()
    {
        $n = $this->so1 + $this->so2;
        var_dump($n);
        $check = 0;
        for ($i = 2; $i < $n; $i++) {
            echo $i;
            if ($n % $i == 0) {
                return "Không phải số nguyên tố";
                $check += 1;
                break;
            }
        }
        if ($check == 0) {
            return "Là số nguyên tố";
        }
    }
    public function ktSoHH()
    {
        $n = $this->so1 + $this->so2;
        $sum = 0;
        for ($i = 1; $i < $n; $i++) {
            if ($n % $i == 0) {
                $sum += $i;
            }
        }
        if ($sum == $n) {
            return "Là số hoàn hảo";
        } else {
            return "Không phải số hoàn hảo";
        }
    }
    public function ktChanLe()
    {
        if (($this->so1 + $this->so2) % 2 == 0) {
            return "Số chẵn";
        } else {
            return "Số lẻ";
        }
    }
}
class KiemTraSo extends ToanHoc
{
    public function setNumber($number)
    {
        $this->number = $number;
    }
    public function checkNt($number)
    {
        $check = 0;
        for ($i = 2; $i <  $number; $i++) {
            // echo $i;
            if ($number % $i == 0) {
                return true;
                $check += 1;
                break;
            }
        }
        if ($check == 0) {
            return false;
        }
    }
    public function checkHh($number)
    {
        $sum = 0;
        for ($i = 1; $i <  $number; $i++) {
            if ($number % $i == 0) {
                $sum += $i;
            }
        }
        if ($sum ==  $number) {
            return true;
        } else {
            return false;
        }
    }
    public function checkCl($number)
    {
        if ($number % 2 == 0) {
            return true;
        } else {
            return false;
        }
    }
}
class HienThiSo extends ToanHoc
{
    public function setNumber($number)
    {
        $this->number = $number;
    }
    public function inSoNt()
    {
        function checkNT($number)
        {
            if ($number > 2) {
                $check = 0;
                for ($t = 2; $t < $number; $t++) {
                    if ($number % $t == 0) {
                        $check += 1;
                        break;
                    }
                }
                if ($check == 0) {
                    echo $number . " || ";
                }
            }
        }

        for ($i = 0; $i < $this->number; $i++) {
            checkNT($i);
        }
    }
    public function inSoHH()
    {
        function checkHH($number)
        {
            if ($number != 0) {
                $sum = 0;
                for ($i = 1; $i <  $number; $i++) {
                    if ($number % $i == 0) {
                        $sum += $i;
                    }
                }
                if ($number == $sum) {
                    echo $number . " || ";
                }
            }
        }
        for ($i = 0; $i < $this->number; $i++) {

            checkHH($i);
        }
    }
    public function inSoC()
    {
        if ($this->number != 0) {
            for ($i = 0; $i <  $this->number; $i++) {
                if ($i % 2 == 0) {
                    echo $i . " || ";
                }
            }
        }
    }
}
class TinhSo extends ToanHoc
{
    public function setSo($so1, $so2)
    {
        $this->so1 = $so1;
        $this->so2 = $so2;
    }
    public function tinhTong()
    {
       echo $this->tong();
    }public function tinhHieu()
    {
       echo $this->hieu();
    }public function tinhTich()
    {
       echo $this->tich();
    }public function tinhThuong()
    {
       echo $this->thuong();
    }
    public function inLuyThua()
    {
        echo $this->mu();
    }
}

