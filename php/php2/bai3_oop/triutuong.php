<?php
//abstract là 1 class cho nên nó cũng có đầy đủ thuộc tính và phương thức nhưng có thêm
// phương thức trìu tượng
//  phương thức trìu tượng phải có abtract ở đầu phương thúc
//abstract đóng vai trò như 1 bản thiết kế cho các class khác khi kế thừa vào phải tuân theo
// abstract class không thể khởi tạo
abstract class DongVat
{
    public $chan;
    abstract function chay();
}
class ConCho extends DongVat
{
    public function chay()
    {
        echo "con chó chạy bằng 4 chân";
    }
}
// class ConMeo extends DongVat
// {
// }
class ConNguoi extends DongVat
{
    public function chay()
    {
        echo "con chó chạy bằng  chân";
    }
}
$cc = new ConCho();
// $cc->chay();



abstract class HinhHoc
{
    abstract function dienTich();
    abstract function chuVi();
}
class HinhVuong extends HinhHoc
{
    public $dodai;
    public function __construct($dodai)
    {
        $this->dodai = $dodai;
    }
    public function dienTich()
    {
        return $this->dodai * $this->dodai;
    }
    public function chuVi()
    {
        return $this->dodai * 4;
    }
}
class HinhCN extends HinhHoc
{
    public $chieuDai;
    public $chieuRong;
    public function __construct($chieuDai, $chieuRong)
    {
        $this->chieuDai = $chieuDai;
        $this->chieuRong = $chieuRong;
    }
    public function dienTich()
    {
        return $this->chieuDai * $this->chieuRong;
    }
    public function chuVi()
    {
        return ($this->chieuDai + $this->chieuRong) * 2;
    }
}
class HinhThang extends HinhHoc
{
    public $day1;
    public $day2;
    public $canhBen1;
    public $canhBen2;
    public $chieuCao;
    public function __construct($day1, $day2, $canhBen1, $canhBen2, $chieuCao)
    {
        $this->day1 = $day1;
        $this->day2 = $day2;
        $this->canhBen1 = $canhBen1;
        $this->canhBen2 = $canhBen2;
        $this->chieuCao = $chieuCao;
    }
    public function dienTich()
    {
        return (($this->day1 + $this->day2) / 2) * $this->chieuCao;
    }
    public function chuVi()
    {
        return $this->day1 + $this->day2 + $this->canhBen1 + $this->canhBen2;
    }
}
$test = new HinhThang(4, 8, 5, 6, 7);
echo "Diện tích: " . $test->dienTich();
echo "<br>";
echo "Chu vi: " . $test->chuVi();
