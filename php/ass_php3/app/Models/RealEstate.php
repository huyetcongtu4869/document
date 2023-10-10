<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealEstate extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='real_estate';
    protected $fillable=['id','name','area','price','desc','address','image','cate'];
}
