<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\AlertMail;

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
        $charts=Record::where('user_id','=', auth()->user()->id)->orderBy('id', 'desc')->limit(25)->get();
        //dd($charts);
        $devices = DB::table('records')->where('user_id','=', auth()->user()->id)->distinct()->get('device');
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
    public function edit($id, Request $request)
    {
        //
      /*  $request->string1="Humedad % ";
        $request->string2="Temperatura C°";
        $request->number1=65;
        $request->number2=26;
        $request->number3=3.2;
        //envia notificacion si la humedad es alta
        if ($request->number1>=65) {
          $request->string1="Humedad";
          $request->string2=$request->number1 . "%";
          $request->number1=65;
          Mail::to(['norellanac@10x.org'])
          ->cc('1005alexis@gmail.com') // enviar correo con copia
          ->send(new AlertMail($request)); //envia la variables $request a la clase de
        }
        //envia notificacion si la temperatura es alta
        if ($request->number2>=26) {
          $request->string1="Temperatura";
          $request->string2=$request->number2 ."C°";
          $request->number1=65;
          Mail::to(['norellanac@10x.org'])
          ->cc('1005alexis@gmail.com') // enviar correo con copia
          ->send(new AlertMail($request)); //envia la variables $request a la clase de
        }
        //envia notificacion si la bateria es baja
        if ($request->number3<=3.2) {
          $request->string1="Bateria";
          $request->string2=round(($request->number3 -2.7 ) * 59) ."% en el dispositivo: " . $request->device;
          $request->number1=65;
          Mail::to(['norellanac@10x.org'])
          ->cc('1005alexis@gmail.com') // enviar correo con copia
          ->send(new AlertMail($request)); //envia la variables $request a la clase de
        }

        return ('se envio mail');*/
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
