<?php

namespace App\Http\Controllers;

use App\Http\Requests\CateNewsRequest;
use App\Models\CateNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CateNewsController extends Controller
{
    public function index()
    {
        $data = DB::table('cate_news')->select('id', 'name')->whereNull('deleted_at')->get();
        return view('cate-news.index', compact('data'));
    }
    public function add(CateNewsRequest $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            $cateNews = CateNews::create($params);
            if ($cateNews->id) {
                Session::flash('success', 'thêm mới thành công');
                return redirect()->route('route_cate_news');
            }
        }
        return view('cate-news.add');
    }
    public function edit(CateNewsRequest $request, $id)
    {
        $data = DB::table('cate_news')->select('id', 'name')->whereNull('deleted_at')->where('id',$id)->first();
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            $result = CateNews::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'sửa thành công sinh viên');
                return redirect()->route('route_cate_news');
            }
        }
        return view('cate-news.edit', compact('data'));
    }
    public function delete($id)
    {
        CateNews::where('id', $id)->delete();
        Session::flash('success', 'xóa thành công ');
        return redirect()->route('route_cate_news');
    }
}
