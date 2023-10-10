<?php
//TÍnh đa hình (interface)
//Interface không phải là 1 class lại có phương thức trìu tượng
interface DiChuyen
{
    function chay();
}
class ConCho implements DiChuyen
{
    public function chay()
    {
        echo "Con chó chạy bằng 4 chân";
    }
}
class OTo implements DiChuyen
{
    public function chay()
    {
        echo "Con chó chạy bằng 4 bánh";
    }
}
//Interface và abstract đều dc gọi là 1 bản thiết kế chi người lập trình phải tuân thủ theo 
//Interface là bản thiết kế cho class có chung hành động
//Abstract là bản thiết kế cho class có cùng bản chất với nhau