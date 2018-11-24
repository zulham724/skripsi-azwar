<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Socket;

class SocketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sockets = Socket::with('user')->get();
        return response()->json($sockets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json($request);
        $count = Socket::where('user_id',$request['user_id'])->count();
        
        $socket = new Socket;
        $socket->fill($request->all());
        $socket->name = "Pengiriman Data ke ".$count;
        $socket->save();
        return response()->json($socket);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $socket = Socket::with('user')->find($id);
        return response()->json($socket);
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
        $socket = Socket::find($id);
        $socket->fill($request->all());
        $socket->update();
        return response()->json($socket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socket = Socket::find($id);
        $socket->delete();
        return response()->json($socket);
    }
}
