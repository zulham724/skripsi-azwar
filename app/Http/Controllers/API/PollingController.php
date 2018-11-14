<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Polling;

class PollingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pollings = Polling::with('user')->get();
        return response()->json($pollings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Polling::where('user_id',$request['user_id'])->count();

        $polling = new Polling;
        $polling->fill($request->all());
        $socket->name = "Pengiriman Data ke ".$count;
        $polling->save();
        return response()->json($polling);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $polling = Polling::with('user')->find($id);
        return response()->json($polling);
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
        $polling = Polling::find($id);
        $polling->fill($request->all());
        $polling->update();
        return response()->json($polling);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $polling = Polling::find($id);
        $polling->delete();
        return response()->json($polling);
    }
}
