<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Device;
use App\User;
use DB;

class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (auth()->user()->role_id == 2){
            $devices=Device::all();
        }else{
            $devices=Device::where('user_id', auth()->user()->id)->get();
        }
        return view('devices.index', ['devices'=>$devices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users=User::all();
        return view('devices.create', ['users'=>$users]);
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
        $device= new Device;
        $device->name=$request->name;
        $device->description=$request->description;
        $device->location=$request->location;
        $device->custom_id=$request->custom_id;
        $device->user_id=$request->user_id;
        $device->save();
        if ($request->custom_id==null) {
          $device->custom_id=$device->id;
          $device->save();
        }
        return view ('devices.index' , ['devices'=>auth()->user()->devices]);
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
        if (auth()->user()->role_id == 2){
            $device=Device::where('id', $id)->get();
        }else{
            $device=Device::where('id', $id)->where('user_id', auth()->user()->id)->get();
        }
        if (sizeof($device)>0) {
            $users=User::all();
            return view('devices.edit', ['device'=>$device, 'users'=>$users]);
        }
        return redirect('device');
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
        $device=Device::findOrFail($id);
        if ( ($device!=null) && ($device->user_id==auth()->user()->id)) {
            $device->name=$request->name;
            $device->description=$request->description;
            $device->location=$request->location;
            $device->user_id=$request->user_id;
            $device->save();
            return redirect('device');
        }
        return redirect('device');
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
