<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $data = DB::table('banner')
        ->select('id','name', 'image')
        ->whereNull('deleted_at')->get();
        return view('banner.index', compact('data'));
    }
    public function add(BannerRequest $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['image'] = uploadFile('image', $request->file('image'));
            }
            $realEstate = Banner::create($params);
            if ($realEstate->id) {
                Session::flash('success', 'thêm mới thành công');
                return redirect()->route('route_banner');
            }
        }
        return view('banner.add');
    }
    public function edit(BannerRequest $request, $id)
    {
        $data = Banner::find($id);
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
            $result = Banner::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'sửa thành công sinh viên');
                return redirect()->route('route_banner');
            }
        }
        return view('banner.edit', compact('data','cate'));
    }
    public function delete($id)
    {
        Banner::where('id', $id)->delete();
        Session::flash('success', 'xóa thành công ');
        return redirect()->route('route_banner');
    }
}
