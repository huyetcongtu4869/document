<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demo extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="demo";//đúng tên bảng trong cơ sở dữ liệu
    protected $fillable=['id','email','name','image'];//định nghĩa những trường trong model để gán lên cơ sở dữ liệu
}
