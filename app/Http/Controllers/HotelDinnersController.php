<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HotelDinnerRequest;
use App\Models\Hotel;
use App\Models\HotelDinner;

class HotelDinnersController extends Controller
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

        return view('hotel_dinners.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = Hotel::where([])->get();
        return view('hotel_dinners.create', compact('hotels')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelDinnerRequest $request)
    {
        if (!Hotel::where(['id' => $request->hotel_id])->count()) {
            return redirect()->back()->withInput()->withErrors('选择酒店不存在！');
        }

        // if (HotelRoom::where(['hotel_id' => $request->hotel_id, 'hotel_number' => $request->hotel_number])->count()) {
        //     return redirect()->back()->withInput()->withErrors('房号已经存在！');
        // } 

        HotelDinner::create($request->all());
        return redirect()->route('hotel_dinners.index')->with('success', '酒店餐费添加成功！'); 
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
