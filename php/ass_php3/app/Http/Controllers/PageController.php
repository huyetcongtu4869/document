<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    protected $bannerImage;
    public function __construct()
    {
        $this->bannerImage = DB::table('banner')
            ->select('image')
            ->whereNull('deleted_at')->inRandomOrder()->first();
    }
    public function home()
    {
        $realEstate = DB::table('real_estate')
            ->select(
                'real_estate.id',
                'real_estate.name',
                'real_estate.area',
                'real_estate.image',
                'real_estate.price',
                'real_estate.address',
                'cate_real_estate.name as cateRealEstate'
            )
            ->join('cate_real_estate', 'cate_real_estate.id', '=', 'real_estate.cate')
            ->whereNull('real_estate.deleted_at')->limit(6)->get();
        // SELECT cate_real_estate.name,COUNT(real_estate.cate) from cate_real_estate
        // join real_estate on cate_real_estate.id=real_estate.cate
        // GROUP by real_estate.cate
        $cateRealEstate = DB::table('cate_real_estate')
            ->select(
                'cate_real_estate.id',
                'cate_real_estate.name',
                'cate_real_estate.image',
                'cate_real_estate.id as quantity'
            )

            ->whereNull('cate_real_estate.deleted_at')->get();
        $news = DB::table('news')
            ->join('cate_news', 'cate_news.id', '=', 'news.cate')
            ->select('news.id', 'news.title', 'news.image', Db::raw('date(news.created_at)as created_at'))
            ->whereNull('news.deleted_at')->limit(4)->get();
        $bannerImage = $this->bannerImage;
        return view('client.home', compact('realEstate', 'cateRealEstate', 'news', 'bannerImage'));
    }
    public function blogSingle()
    {
        $bannerImage = $this->bannerImage;
        return view('client.blog-single', compact('bannerImage'));
    }
    public function properties()
    {
        $bannerImage = $this->bannerImage;
        return view('client.properties', compact('bannerImage'));
    }
    public function propertiesSingle($id)
    {
        $bannerImage = $this->bannerImage;
        $data = DB::table('real_estate')
            ->select(
                'real_estate.id',
                'real_estate.name',
                'real_estate.area',
                'real_estate.image',
                'real_estate.price',
                'real_estate.desc',
                'real_estate.address',
                'cate_real_estate.name as cateRealEstate'
            )
            ->join('cate_real_estate', 'cate_real_estate.id', '=', 'real_estate.cate')
            ->whereNull('real_estate.deleted_at')->where('real_estate.id', $id)->first();
        return view('client.properties-single', compact('data', 'bannerImage'));
    }
    public function blog()
    {
        $bannerImage = $this->bannerImage;
        return view('client.blog', compact('bannerImage'));
    }
}
