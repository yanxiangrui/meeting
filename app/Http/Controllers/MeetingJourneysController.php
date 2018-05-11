<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetingJourney;
use App\Models\Meeting;
use App\Http\Requests\MeetingJourneyRequest;


class MeetingJourneysController extends Controller
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

            $journeys = MeetingJourney::where([])->orderBy($request->get('field', 'id'), $request->get('order', 'desc'))
                        ->with('meeting')
                        ->offset($offset)
                        ->limit($request->limit)
                        ->get();

            $count = MeetingJourney::where([])->count();
            return ['code' => 0, 'data' => $journeys, 'msg' => '', 'count' => $count];
        }
        return view('meeting_journeys.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meetings = Meeting::where([])->get();
        return view('meeting_journeys.create', compact('meetings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeetingJourneyRequest $request)
    {

        if (!Meeting::where(['id' => $request->meeting_id])->count()) {
            return redirect()->back()->withInput()->withErrors('请选择行程所属的会议！');
        }  
    
        MeetingJourney::create($request->all());
        return redirect()->route('meeting_journeys.index')->with('success', '会议行程添加成功！'); 
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
    public function edit(MeetingJourney $journey)
    {
        return view('meeting_journeys.edit', compact('journey'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MeetingJourneyRequest $request, MeetingJourney $journey)
    {
        if (!Meeting::where(['meeting_id' => $request->meeting_id])->count()) {
            return redirect()->back()->withInput()->withErrors('请选择行程所属的会议！');
        }   

        MeetingJourney::update($request->all());
        return redirect()->route('meeting_journeys.index')->with('success', '会议行程修改成功！');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeetingJourney $journey)
    {
        $journey->delete();  
        return ['code' => 0, 'msg' => '删除成功！'];
    }
}
