<?php

namespace App\Controllers;

use eftec\bladeone\BladeOne;

class BaseController
{

    protected function render($viewFile, $data = [])
    {
        $viewDir = "./app/views"; //đường dẫn đến views
        $storageDir = "./storage"; //thư mục storage tạo cùng cấp với app
        $blade = new BladeOne($viewDir, $storageDir, BladeOne::MODE_DEBUG);
        echo $blade->run($viewFile, $data);
    }
}
