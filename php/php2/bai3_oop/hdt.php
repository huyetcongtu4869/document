<?php
class SinhVien
{
    //đây là thuộc tính hay còn được gọi là biến
    public $maSV;
    public $tenSV;
    public $namSinh;
    //phương thức khởi tạo (Hàm đặt biệt)
    // public function __construct($maSV,$tenSV,$namSinh)
    // {
    //    $this->maSV=$maSV;
    //    $this->tenSV=$tenSV;
    //    $this->namSinh=$namSinh;
    // } 
    //Tạo ra hàm để set giá trị
    public function setSV($maSV, $tenSV = "", $namSinh = "")
    {
        $this->maSV = $maSV;
        $this->tenSV = $tenSV;
        $this->namSinh = $namSinh;
    }
    // public function setTenSV($tenSV)
    // {
    //     $this->tenSV = $tenSV;
    // }
    // public function setNamSinh($namSinh)
    // {
    //     $this->namSinh = $namSinh;
    // }
    //phương thức hay được gọi là hàm
    public function hienThiThongTin()
    {
        echo "Mã sv:" . $this->maSV . " Tên SV:" . $this->tenSV . " Năm sinh:" . $this->namSinh;
    }
}
//Khởi tạo đối tượng(Tạo ra nhiều đối thượng sinh viên)
$sv1 = new SinhVien(); //tạo ra 1 sinh viên
$sv1->setSV("PH2324 ", "nguyyeens", 457674);
// $sv1->setTenSV("Mạnh Huy ");
// $sv1->setNamSinh(45345);
// $sv1->hienThiThongTin();
// echo ("<br>");
$sv2 = new SinhVien();
$sv2->setSV("PH23234454 ", "nguyyeens", 457674);
// $sv2->hienThiThongTin();
// echo ("<br>");






//bai1
class HInhChuNhat
{
    public $chieuDai;
    public $chieuRong;
    public function __construct($cd, $cr,)
    {
        $this->chieuDai = $cd;
        $this->chieuRong = $cr;
        echo "Chu vi: " . ($this->chieuDai + $this->chieuRong) * 2;
        echo "<br>";
        echo "Diện Tích: " . ($this->chieuDai * $this->chieuRong);
        echo "<br>";
    }
}
$hinh1 = new HInhChuNhat(3, 4);
//Bài 2
class PhuongTrinhBac2
{
    public $a;
    public $b;
    public $c;
    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        if ($a > 0) {
            $delta = $b * $b - 4 * $a * $c;
            echo "Delta: " . $delta . "<br>";
            if ($delta < 0) echo "Phương trình vô nghiêm";
            elseif ($delta > 0) {
                echo "Nghiệm 1: " . (-$b + sqrt($delta)) / (2 * $a) . "<br>";
                echo "Nghiệm 2: " . (-$b - sqrt($delta)) / (2 * $a) . "<br>";
            } elseif ($delta == 0) echo "Nghiệm kép: " . (-$b) / (2 * $a);
        } else echo "a bé hơn 0";
    }
    
}
$dfsd = new PhuongTrinhBac2(1, 2, 1);
//bai3
class HocSinh
{
    public $ten;
    public $tuoi;
    public $diaChi;
    public $diemToan;
    public $diemLy;
    public $diemHoa;
    public function __construct($ten, $tuoi, $diaChi, $diemToan, $diemLy, $diemHoa)
    {
        $this->ten = $ten;
        $this->tuoi = $tuoi;
        $this->diaChi = $diaChi;
        $this->diemToan = $diemToan;
        $this->diemLy = $diemLy;
        $this->diemHoa = $diemHoa;
        $diemTrungBinh = ($diemToan + $diemLy + $diemHoa) / 3;
        echo " Tên: " . $ten . " Tuổi: " . $tuoi . " Địa chỉ: " . $diaChi . " Điểm trung bình: " . $diemTrungBinh;
        echo " Xếp Loại: " . ($diemTrungBinh < 4 ? "kém" : ($diemTrungBinh < 6 ? "Trung bình" : ($diemTrungBinh < 8 ? "khá" : "giỏi")));
    }
}
echo "<br>";
$fdsfsd = new HocSinh("dsdfd", 234, "sdfgdfg", 4, 5, 6);




















class GiangVien
{
    public $tenGV;
    public $maGV;
    public $namSinh;
    public $luongCB;
    public $soGioDay;

    public function setGV($tenGV, $maGV, $namSinh, $luongCB, $soGioDay)
    {
        $this->tenGV = $tenGV;
        $this->maGV = $maGV;
        $this->namSinh = $namSinh;
        $this->luongCB = $luongCB;
        $this->soGioDay = $soGioDay;
    }
    public function tinhTuoiGV()
    {
        return getdate()['year'] - ($this->namSinh);
    }
    public function tinhLuong()
    {
        return $this->luongCB * $this->soGioDay;
    }
    public function xepLoai()
    {
        if ($this->tinhLuong() >= 5000) {
            return "Đạt";
        } else {
            return "Không đạt";
        }
    }
    public function hienThiThongTin()
    {
        echo "Tên giảng viên: " . $this->tenGV . " Mã giảng viên: " . $this->maGV . " Năm sinh: " . $this->namSinh .
            " Lương cơ bản:" . $this->luongCB . " Số giờ dạy: " . $this->soGioDay . "Tuổi: " . $this->tinhTuoiGV() .
            "Lương: " . $this->tinhLuong() . "Xếp Loại: " . $this->xepLoai();
    }
}
$gv1 = new GiangVien();
$gv1->setGV("Balgfdg", "Ph423423", 1990, 300, 55);
// $gv1->hienThiThongTin();
echo ("<br>");
$gv2 = new GiangVien();
$gv2->setGV("fđfg", "Ph67673", 1997, 300, 55);
// $gv2->hienThiThongTin();