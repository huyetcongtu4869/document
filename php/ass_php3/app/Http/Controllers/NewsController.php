<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewstRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $data = DB::table('news')
        ->join('cate_news', 'cate_news.id', '=', 'news.cate')
        ->select('news.id', 'news.title', 'cate_news.name as catenews', 'news.created_at')
        ->whereNull('news.deleted_at')->get();
        return view('news.index', compact('data'));
    }
    public function add(NewstRequest $request)
    {
        $cate = DB::table('cate_news')->select('id', 'name')->whereNull('deleted_at')->get();
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['image'] = uploadFile('image', $request->file('image'));
            }
            $news = News::create($params);
            if ($news->id) {
                Session::flash('success', 'thêm mới thành công');
                return redirect()->route('route_news');
            }
        }
        return view('news.add', compact('cate'));
    }
    public function edit(NewstRequest $request, $id)
    {

        $data = News::find($id);
        $cate = DB::table('cate_news')->select('id', 'name')->whereNull('deleted_at')->get();
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $resultDL = Storage::delete('/public/' . $data->image);
                if ($resultDL) {
                    $params['image'] = uploadFile('image', $request->file('image'));
                }
            } else {
                $params['image'] = $data->image;
            }
            $result = News::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'sửa thành công sinh viên');
                return redirect()->route('route_news');
            }
        }
        return view('news.edit', compact('data','cate'));
    }
    public function delete($id)
    {
        News::where('id', $id)->delete();
        Session::flash('success', 'xóa thành công ');
        return redirect()->route('route_news');
    }
}
