<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelRoomType;
use App\Http\Requests\HotelRoomTypeRequest;

class HotelRoomTypesController extends Controller
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

            $where = [];

            if ($request->hotel_id) {
                $where[] = ['hotel_id', '=', $request->hotel_id];
            }

            $roomtypes = HotelRoomType::where($where)->orderBy($request->get('field', 'id'), $request->get('order', 'desc'))
                        ->with('hotel', 'rooms')
                        ->offset($offset)
                        ->limit($request->limit)
                        ->get();

            $count = HotelRoomType::where($where)->count();
            return ['code' => 0, 'data' => $roomtypes, 'msg' => '', 'count' => $count];
        }

        return view('hotel_room_types.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = Hotel::where([])->get();
        return view('hotel_room_types.create', compact('hotels')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelRoomTypeRequest $request)
    {
        if (HotelRoomType::where(['hotel_id' => $request->hotel_id, 'title' => $request->title])->count()) {
            return redirect()->back()->withInput()->withErrors('房型名称已存在！');
        }

        HotelRoomType::create($request->all());
        return redirect()->route('hotel_room_types.index')->with('success', '酒店房型添加成功！'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function edit(HotelRoomType $hotelRoomType)
    {
        $hotels = Hotel::where([])->get();
        return view('hotel_room_types.edit', compact('hotels', 'hotelRoomType')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HotelRoomTypeRequest $request, HotelRoomType $hotelRoomType)
    { 
        if (HotelRoomType::where([
                ['hotel_id', "=", $request->hotel_id], 
                [ 'title', "=", $request->title], 
                ['id', '<>', $hotelRoomType->id]
            ])->count()) {

            return redirect()->back()->withInput()->withErrors('房型名称已存在！');
        }

        $hotelRoomType->update($request->all());
        return redirect()->route('hotel_room_types.index')->with('success', '酒店房型修改成功！');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelRoomType $hotelRoomType)
    {
        $hotelRoomType->delete(); 
        return ['code' => 0, 'msg' => '删除成功！'];  
    }
}
