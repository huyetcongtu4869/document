<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CateRealEstate extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="cate_real_estate";
    protected $fillable=['id','name','image'];

}
