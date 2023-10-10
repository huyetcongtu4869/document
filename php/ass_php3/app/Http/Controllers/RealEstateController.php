<?php

namespace App\Http\Controllers;

use App\Http\Requests\RealEstateRequest;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class RealEstateController extends Controller
{
    public function index()
    {
        $realEstate = DB::table('real_estate')
            ->join('cate_real_estate', 'cate_real_estate.id', '=', 'real_estate.cate')
            ->select(
                'real_estate.id',
                'real_estate.name',
                'real_estate.area',
                'real_estate.price',
                'real_estate.address',
                'cate_real_estate.name as cateRealEstate'
            )
            ->whereNull('real_estate.deleted_at')->get();
        return view('real-estate.index', compact('realEstate'));
    }
    public function add(RealEstateRequest $request)
    {
        $cate = DB::table('cate_real_estate')->select('id', 'name')->get();
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['image'] = uploadFile('image', $request->file('image'));
            }
            $realEstate = RealEstate::create($params);
            if ($realEstate->id) {
                Session::flash('success', 'thêm mới thành công');
                return redirect()->route('route_real_estate');
            }
        }
        return view('real-estate.add', compact('cate'));
    }
    public function edit(RealEstateRequest $request, $id)
    {
        $data = DB::table('real_estate')->where('id', $id)
            ->select('id', 'name', 'area', 'desc', 'address', 'price', 'cate', 'image')->first();
        $cate = DB::table('cate_real_estate')->select('id', 'name')->get();
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
            $result = RealEstate::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'sửa thành công sinh viên');
                return redirect()->route('route_real_estate');
            }
        }
        return view('real-estate.edit', compact('data', 'cate'));
    }
    public function delete($id)
    {
        RealEstate::where('id', $id)->delete();
        Session::flash('success', 'xóa thành công ');
        return redirect()->route('route_real_estate');
    }
}
