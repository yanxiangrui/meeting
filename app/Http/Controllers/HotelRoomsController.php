<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelRoom;
use App\Models\Hotel;
use App\Models\HotelRoomType;
use App\Http\Requests\HotelRoomRequest;

class HotelRoomsController extends Controller
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
            $hotels = HotelRoom::where([])->orderBy($request->get('field', 'id'), $request->get('order', 'desc'))
                        ->with('hotel', 'roomtype')
                        ->offset($offset)
                        ->limit($request->limit)
                        ->get();

            $count = HotelRoom::where([])->count();
            return ['code' => 0, 'data' => $hotels, 'msg' => '', 'count' => $count];
        }

        return view('hotel_rooms.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = Hotel::where([])->get();
        return view('hotel_rooms.create', compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelRoomRequest $request)
    {
        if (!Hotel::where(['id' => $request->hotel_id])->count()) {
            return redirect()->back()->withInput()->withErrors('选择酒店不存在！');
        }

        if (!HotelRoomType::where(['hotel_id' => $request->hotel_id,'id' => $request->hotel_room_type_id])->count()) {
            return redirect()->back()->withInput()->withErrors('选择房型不存在！');
        }

        if (HotelRoom::where(['hotel_id' => $request->hotel_id, 'hotel_number' => $request->hotel_number])->count()) {
            return redirect()->back()->withInput()->withErrors('房号已经存在！');
        } 

        HotelRoom::create($request->all());
        return redirect()->route('hotel_rooms.index')->with('success', '酒店房间添加成功！'); 
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
    public function edit(HotelRoom $hotelRoom)
    {
        $hotels = Hotel::where([])->get();
        return view('hotel_rooms.edit', compact('hotels', 'hotelRoom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HotelRoomRequest $request, HotelRoom $hotelRoom)
    {
        if (!Hotel::where(['id' => $request->hotel_id])->count()) {
            return redirect()->back()->withInput()->withErrors('选择酒店不存在！');
        }

        if (!HotelRoomType::where(['hotel_id' => $request->hotel_id,'id' => $request->hotel_room_type_id])->count()) {
            return redirect()->back()->withInput()->withErrors('选择房型不存在！');
        }

        if (HotelRoom::where([
            ['hotel_id', '=', $request->hotel_id],
            ['hotel_number', '=', $request->hotel_number],
            ['id', '<>', $hotelRoom->id]
        ])->count()) {
            return redirect()->back()->withInput()->withErrors('房号已经存在！');
        } 

        $hotelRoom->update($request->all());
        return redirect()->route('hotel_rooms.index')->with('success', '酒店房间修改成功！');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelRoom $hotelRoom)
    {
        $hotelRoom->delete();
        return ['code' => 0, 'msg' => '删除成功！'];  
    }
}
