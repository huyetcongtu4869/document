<?php
// class ConNguoi
// {
//     public $hoTen;
//     public $diaChi;
//     public $namSinh;
//     public $email;
//     public $sdt;
//     public function __construct($hoTen, $diaChi, $namSinh, $email, $sdt)
//     {
//         $this->hoTen = $hoTen;
//         $this->diaChi = $diaChi;
//         $this->namSinh = $namSinh;
//         $this->email = $email;
//         $this->sdt = $sdt;
//     }
//     public function tinhTuoi()
//     {
//         return getdate()['year'] - ($this->namSinh);
//     }
//     public function hienThiConNguoi()
//     {
//         echo "Họ Tên: " . $this->hoTen . " Địa chỉ: " . $this->diaChi . " Tuổi: " . $this->tinhTuoi() .
//             " Email: " . $this->email . " Sđt: " . $this->sdt;
//     }
// }
// class SinhVien extends ConNguoi
// {
//     public $diemToan;
//     public $diemLy;
//     public $diemHoa;
//     public function __construct($hoTen, $diaChi, $namSinh, $email, $sdt, $diemToan, $diemLy, $diemHoa)
//     {
//         parent::__construct($hoTen, $diaChi, $namSinh, $email, $sdt);
//         $this->diemToan = $diemToan;
//         $this->diemLy = $diemLy;
//         $this->diemHoa = $diemHoa;
//     }
//     public function diemTB()
//     {
//         return ($this->diemToan + $this->diemLy + $this->diemHoa) / 3;
//     }
//     public function hienThiHocSinh()
//     {
//         echo $this->hienThiConNguoi() . " Điểm trung bình: " . $this->diemTB() . "<br>";
//     }
// }
// class GiangVien extends ConNguoi
// {
//     public $luongCB;
//     public $soGioDay;
//     public function __construct($hoTen, $diaChi, $namSinh, $email, $sdt, $luongCB, $soGioDay)
//     {
//         parent::__construct($hoTen, $diaChi, $namSinh, $email, $sdt);

//         $this->luongCB = $luongCB;
//         $this->soGioDay = $soGioDay;
//     }
//     public function tinhLuong()
//     {
//         return $this->luongCB * $this->soGioDay;
//     }
//     public function hienThiGiangVien()
//     {
//         echo  $this->hienThiConNguoi() . "Lương: " . $this->tinhLuong() . "<br>";
//     }
// }
// $gvh = new SinhVien("Mạnh Huy", "Hà Nội", 2003, "huy@gmail.com", "0475348",8, 10, 9);
// $gvh->hienThiHocSinh();
abstract class Animal
{ // child classes must implement this 
    abstract function prey();
    public function run()
    {
        echo 'I am running!';
    }
}
class Dog extends Animal
{
    public function prey()
    {
        echo 'I killed the cat !';
    }
}
class Cat extends Animal
{
    public function prey()
    {
        echo 'I killed the rat !';
    }
}
$cat = new Cat();
$cat->prey();
