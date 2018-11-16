<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Polling;
use App\Models\Socket;

class CompareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dates(){
        $pollings = Polling::get();
        $sockets = Socket::get();
        
        foreach ($pollings as $p => $polling) {
            $results[$p]['name'] = "Pengiriman Data ke ".$p;
            $results[$p]['polling_date'] = $polling->date;
        }

        foreach ($sockets as $s => $socket) {
            $results[$s]['socket_date'] = $socket->date;
        }

        foreach ($results as $r => $result) {
            if(isset($result['socket_date'],$result['polling_date'])){

                $socket_date = new \DateTime($result['socket_date']);
                $polling_date =  new \DateTime($result['polling_date']);
                $results[$r]['time'] = $socket_date->diff($polling_date);
                $results[$r]['difference_in_seconds'] = $socket_date->format('U') - $polling_date->format('U');
                $datasets[$r] = $socket_date->format('U') - $polling_date->format('U');

                // array

                if($socket_date > $polling_date){
                    $results[$r]['faster'] = 'long polling';
                    $labels[$r] = "long polling"; 
                } else {
                    $results[$r]['faster'] = 'socket';
                    $labels[$r] = "socket";
                }
            }
        }

        return response()->json([
            "result"=>$results,
            "labels"=>$labels,
            "datasets"=>$datasets
        ]);
    }

    public function bandwidth(){
        $pollings = Polling::get();
        $sockets = Socket::get();

        foreach ($pollings as $p => $polling) {
            $results[$p]['name'] = "Pengiriman Data ke ".$p;
            $results[$p]['polling_bandwidth'] = $polling->bandwidth_usage;
        }

        foreach ($sockets as $s => $socket) {
            $results[$s]['socket_bandwidth'] = $socket->bandwidth_usage;
        }

        foreach ($results as $r => $result) {
            if(isset($result['socket_bandwidth'],$result['polling_bandwidth'])){

                $labels[$r] = $result['name'];
                $datasets['polling'][$r] = $result['polling_bandwidth'];
                $datasets['socket'][$r] = $result['socket_bandwidth'];
            }
        }

        return response()->json([
            "labels" => $labels,
            "datasets" => $datasets 
        ]);

    }

    public function cpu(){
        $pollings = Polling::get();
        $sockets = Socket::get();

        foreach ($pollings as $p => $polling) {
            $results[$p]['name'] = "Pengiriman Data ke ".$p;
            $results[$p]['polling_cpu'] = $polling->cpu_usage;
        }

        foreach ($sockets as $s => $socket) {
            $results[$s]['socket_cpu'] = $socket->cpu_usage;
        }

        foreach ($results as $r => $result) {
            if(isset($result['socket_cpu'],$result['polling_cpu'])){

                $labels[$r] = $result['name'];
                $datasets['polling'][$r] = $result['polling_cpu'];
                $datasets['socket'][$r] = $result['socket_cpu'];
            }
        }

        return response()->json([
            "labels" => $labels,
            "datasets" => $datasets 
        ]);
    }

    public function memory(){
        $pollings = Polling::get();
        $sockets = Socket::get();

        foreach ($pollings as $p => $polling) {
            $results[$p]['name'] = "Pengiriman Data ke ".$p;
            $results[$p]['polling_memory'] = $polling->memory_usage;
        }

        foreach ($sockets as $s => $socket) {
            $results[$s]['socket_memory'] = $socket->memory_usage;
        }

        foreach ($results as $r => $result) {
            if(isset($result['socket_memory'],$result['polling_memory'])){

                $labels[$r] = $result['name'];
                $datasets['polling'][$r] = $result['polling_memory'];
                $datasets['socket'][$r] = $result['socket_memory'];
            }
        }

        return response()->json([
            "labels" => $labels,
            "datasets" => $datasets 
        ]);
    }

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
