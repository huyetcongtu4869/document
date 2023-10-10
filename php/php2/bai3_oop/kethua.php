<?php
class ConNguoi
{
    public $chan;
    public $tay;
    public $mat;
    public function __construct($chan, $tay)
    {
        $this->chan = $chan;
        $this->tay = $tay;
    }
    public function an()
    {
        echo "Ăn bằng mồm";
    }
    // public function setChan($chan)
    // {
    //     $this->chan = $chan;
    // }
    // public function setTay($tay)
    // {
    //     $this->tay = $tay;
    // }
}
//nếu class con chưa có hàm khởi tạo thì class con sẽ tự động nhận hàm khởi tạo từ class cha
// Khi class con có hàm khởi tạo thì class con sẽ tự nhận hàm khởi yaoj của chính nó chứ không nhận của cha nữa
class NguoiLon extends ConNguoi
{
    public $chieuCao;
    public function __construct($chan, $tay, $chieuCao)
    {
        parent::__construct($chan, $tay);
        $this->chieuCao = $chieuCao;
    }
    public function di()
    {
        echo "đi bằng " . $this->chan . "chân" . $this->tay . " " . $this->chieuCao;
    }
    public function noi()
    {
    }
}
class TreCon extends ConNguoi
{
    public function bo()
    {
        echo "trẻ con bò bằng " . $this->chan . " chân " . $this->tay . " tay ";
    }
}
$nl1 = new NguoiLon(1, 2, 3);
// $nl1->an();
// $nl1->setChan(2);
$nl1->di();
$trecon = new TreCon(1, 2);
// $trecon->an();
// $trecon->setChan(2);
// $trecon->setTay(2);
// $trecon->bo();
