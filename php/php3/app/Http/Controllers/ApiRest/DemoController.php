<?php

namespace App\Http\Controllers\ApiRest;

use App\Http\Controllers\Controller;
use App\Http\Resources\DemoResource;
use App\Models\Demo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Demo::all();
        return DemoResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $demo = Demo::create($request->all());
        return new Demo($demo);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $demo = Demo::find($id);
        if (!$demo) {
            return response()->json(['message' => 'data not found'], 404);
        }
        return new DemoResource($demo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
