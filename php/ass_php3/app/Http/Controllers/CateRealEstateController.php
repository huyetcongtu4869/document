<?php

namespace App\Http\Controllers;

use App\Http\Requests\CateRealEstateRequest;
use App\Models\CateRealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CateRealEstateController extends Controller
{
    public function index()
    {

        $data = DB::table('cate_real_estate')->select('id', 'name')->whereNull('deleted_at')->get();
        return view('cate-real-estate.index', compact('data'));
    }
    public function add(CateRealEstateRequest $request)
    {

        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['image'] = uploadFile('image', $request->file('image'));
            }
            $cateRealEstate = CateRealEstate::create($params);
            if ($cateRealEstate->id) {
                Session::flash('success', 'thêm mới thành công');
                return redirect()->route('route_cate_real_estate');
            }
        }
        return view('cate-real-estate.add');
    }
    public function edit(CateRealEstateRequest $request, $id)
    {

        $data = CateRealEstate::find($id);
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
            $result = CateRealEstate::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'Sửa thành công sinh viên');
                return redirect()->route('route_cate_real_estate');
            }
        }
        return view('cate-real-estate.edit', compact('data'));
    }
    public function delete($id)
    {
        CateRealEstate::where('id', $id)->delete();
        Session::flash('success', 'Xóa thành công ');
        return redirect()->route('route_cate_real_estate');
    }
}
