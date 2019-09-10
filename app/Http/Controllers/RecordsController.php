<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use Illuminate\Support\Facades\DB;
class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$records=Record::where('id','>',150)->get();
        $records=Record::where('user_id','=', auth()->user()->id)->orderBy('id', 'desc')->limit(150)->get();
        return view ('records.index', [ 'records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $records=Record::where('user_id','=', auth()->user()->id)->orderBy('id', 'desc')->limit(1)->get();
        $charts=Record::where('user_id','=', auth()->user()->id)->orderBy('id', 'desc')->limit(20)->get();
        $devices = DB::table('records')->distinct()->get('device');
        //dd($devices);
        return view ('records.create', ['records'=>$records, 'charts'=>$charts, 'devices'=>$devices]);
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
        $record= new Record;
        $record->string1=$request->string1;
        $record->string2=$request->string2;
        $record->string3=$request->string3;
        $record->number1=$request->number1;
        $record->number2=$request->number2;
        $record->number3=$request->number3;
        $record->save();
        return $record;

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
        $records=Record::where('user_id','=', auth()->user()->id )->where('device', '=', $id)->orderBy('created_at', 'desc')->limit(1)->get();
        //$last=Record::where('id','>', 0)->orderBy('created_at', 'desc')->limit(1)->get();
        //dd($records);
        $charts=Record::where('user_id','=', auth()->user()->id)->where('device', '=', $id)->orderBy('id', 'desc')->limit(20)->get();
        return view ('records.show', ['records'=>$records, 'charts'=>$charts]);
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
