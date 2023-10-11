<?php

namespace App\Http\Controllers;

use App\Http\Requests\DemoRequest;
use App\Models\Demo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

// use Symfony\Component\HttpFoundation\Session\Session;

class DemoController extends Controller
{
    public function index()
    {
        $title = "Hello Laravel";
        $name = "Mạnh Huy";
        // echo $title;
        // $student=DB::table('demo')->get();
        //lấy toàn bộ dữ liệu của bảng demo
        //tương đương với "select * from demo"
        // dd($student);
        $studentCondition = DB::table('demo')->select('id', 'name', 'image')->whereNull('deleted_at')->get();
        //lấy 1 số trường mong muốn
        // $student=DB::table('demo')->where('id','=',0)->first();
        //lấy 1 dữ liệu théo dk
        // $countST=Db::table('demo')->count();
        // $studentCondition = Db::table('demo')
        //     ->where('id', '>=', '1')
        //     ->where('id', '<', '6')
        //     ->orWhere('email', '=', 'igleichner@example.org')
        //     ->get();
        // session('destroy');
        return view('demo.index', compact('title', 'studentCondition'));
    }
    public function add(DemoRequest $request)
    {
        if ($request->isMethod('POST')) { //Tồn tại phương thức 
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['image'] = uploadFile('image', $request->file('image'));
            }
            $demo = Demo::create($params);
            if ($demo->id) {
                Session::flash('success', 'thêm mới thành công người dùng');
                return redirect()->route('route_demo_add');
            }
        }
        return view('demo.add');
    }
    public function edit(DemoRequest $request, $id)
    {
        //cách 1
        // $demo = DB::table('demo')
        //     ->where('id', $id)->first();
        //cách 2
        $demo = Demo::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            //
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                //có file mới upload lên sẽ link vào để xóa ảnh cũ đi
              $resultDL = Storage::delete('/public/'.$demo->image);
              if ($resultDL) {
                  $params['image'] = uploadFile('image',$request->file('image'));
              }
            } else {
                $params['image'] = $demo->image;
            }
           $result = demo::where('id',$id)
               ->update($params);
           if ($result) {
               Session::flash('success','sửa  thành công sinh viên');
               return redirect()->route('route_demo_edit',['id'=>$id]);
           }
        }
        return view('demo.edit', compact('demo'));
    }
    public function delete($id) {
        Demo::where('id',$id)->delete();
        Session::flash('success','xóa thành công sinh viên có id là'.$id);
        return redirect()->route('route_demo_delete');
    }
}
