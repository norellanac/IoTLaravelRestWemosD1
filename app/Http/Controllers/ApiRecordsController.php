<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use App\User;

use Illuminate\Support\Facades\Mail;
use App\Mail\AlertMail;

class ApiRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$records=Record::where('id','>',150)->get();
        $records=Record::all();
        return $records;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $record= new Record;
        $record->string1=$request->text1;
        $record->string2=$request->text2;
        //$record->string3=$request->text3;
        $record->number1=$request->num1;
        $record->number2=$request->num2;
        $record->number3=$request->num3;
        $record->user_id=$request->user_id;
        $record->device=$request->device;
        $record->save();

        $user=User::find($request->user_id);
        //envia notificacion si la humedad es alta
        if ($request->num1>=70) {
          $request->string1="Humedad";
          $request->string2=$request->num1 . " %";
          Mail::to([$user->email])
          ->cc(['pispache@10x.org', 'bgil@10x.org', 'drodas@10x.org', 'vbala@10x.org', 'mprado@neoethicals.com']) // enviar correo con copia
          ->send(new AlertMail($request)); //envia la variables $request a la clase de
        }
        //envia notificacion si la temperatura es alta
        if ($request->num2>=28) {
          $request->string1="Temperatura";
          $request->string2=$request->num2 ." C°";
          Mail::to([$user->email])
          ->cc(['pispache@10x.org', 'bgil@10x.org', 'drodas@10x.org', 'vbala@10x.org', 'mprado@neoethicals.com']) // enviar correo con copia
          ->send(new AlertMail($request)); //envia la variables $request a la clase de
        }
        //envia notificacion si la bateria es baja
        if ($request->num3<=3.1) {
          $request->string1="Bateria";
          $request->string2=round(($request->num3 -2.7 ) * 59) ."% en el dispositivo: " . $request->device;
          $request->number1=65;
          Mail::to([$user->email])
          ->cc(['pispache@10x.org', 'bgil@10x.org', 'drodas@10x.org', 'vbala@10x.org', 'mprado@neoethicals.com']) // enviar correo con copia
          ->send(new AlertMail($request)); //envia la variables $request a la clase de
        }

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
