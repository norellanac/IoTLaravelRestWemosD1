<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{


  public function index(Request $request)
  {
    //
    $from = new \DateTime($request->date);
    $to = new \DateTime($request->date);
    //echo ($from->modify('+6 hours')->format('Y-m-d H:i'));
    //dd($to->modify('+30 hours')->format('Y-m-d H:i'));
    $records=$users = DB::table('records')
    ->where('user_id','=', auth()->user()->id)
    ->whereBetween('created_at', [$from->modify('+6 hours')->format('Y-m-d H:i'), $to->modify('+30 hours')->format('Y-m-d H:i')])->get();
    //dd($records);
    return view ('records.index', [ 'records' => $records]);
  }

  public function fechas(Request $request)
  {
    //
    //dd($request);
    $from = new \DateTime($request->dateFrom);
    $to = new \DateTime($request->dateTo);
    //echo ($from->modify('+6 hours')->format('Y-m-d H:i'));
    //dd($to->modify('+30 hours')->format('Y-m-d H:i'));
    $records=$users = DB::table('records')
    ->where('user_id','=', auth()->user()->id)
    ->whereBetween('created_at', [$from->modify('+6 hours')->format('Y-m-d H:i'), $to->modify('+30 hours')->format('Y-m-d H:i')])->get();
    //dd($records);
    return view ('records.index', [ 'records' => $records]);
  }
}
