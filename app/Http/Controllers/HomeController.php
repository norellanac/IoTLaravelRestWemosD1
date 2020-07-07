<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      //fecha para obtener los registrosdel dia 
        
        //Role::create(['name' => 'Admin']);
        if (auth()->user()) {
            //
            $user = auth()->user();
            if (!$user->hasAnyRole(['User', 'Admin', 'SuperAdmin'])) {
                $user->syncRoles(['User']);
            }
        }
        $devices = DB::table('records')->where('user_id', '=', auth()->user()->id)->distinct()->get('device');
        $records = Record::where('user_id', '=', auth()->user()->id)->orderBy('id', 'desc')->limit(1)->with('deviceInfo')->get();
        //limita los registros a la cantidad de sensores multiplicada por 10
        $date = new \DateTime($records->first()->created_at);
        $date->modify('-12 hours'); //obtener los registros de las ultimas 12 horas (18 por la diferencia utc-6)
        $formatted_date = $date->format('Y-m-d H:i:s');
        $charts = Record::where('user_id', '=', auth()->user()->id)->where('updated_at', '>', $formatted_date)->orderBy('id', 'desc')->limit(sizeof($devices) * 10)->get();
        //dd($charts);
        //dd($devices);
        return view('records.create', ['records' => $records, 'charts' => $charts, 'devices' => $devices]);
    }
    public function search()
    {

        return view('records.search', ['records' => null]);
    }

    public function show(Request $request)
    {
        //
        //dd(auth()->user()->id);
        $records = Record::where('user_id', '=', auth()->user()->id)->where('device', '=', $request->code)->orderBy('created_at', 'desc')->limit(1)->with('deviceInfo')->get();
        //$last=Record::where('id','>', 0)->orderBy('created_at', 'desc')->limit(1)->get();
        //dd($records);
        $charts = Record::where('user_id', '=', auth()->user()->id)->where('device', '=', $request->code)->orderBy('id', 'desc')->limit(20)->get();
        return view('records.show', ['records' => $records, 'charts' => $charts]);
    }
}
