<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HotelRequest;
use App\Models\Hotel;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $offset = ($request->page - 1) * $request->limit;

            $hotels = Hotel::where([])->orderBy($request->get('field', 'id'), $request->get('order', 'desc'))
                        ->offset($offset)
                        ->limit($request->limit)
                        ->get();

            $count = Hotel::where([])->count();

            return ['code' => 0, 'data' => $hotels, 'msg' => '', 'count' => $count];
        } 
        return view('hotels.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotels.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelRequest $request)
    { 
        $hotel = Hotel::create($request->all());
        return redirect()->route('hotels.index')->with('success', '酒店添加成功！'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HotelRequest $request, Hotel $hotel)
    {
        $hotel->update(['name' => $request->name]);
        return redirect()->route('hotels.index')->with('success', '酒店修改成功！');     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete(); 
        return ['code' => 0, 'msg' => '删除成功！'];  
    }
}
