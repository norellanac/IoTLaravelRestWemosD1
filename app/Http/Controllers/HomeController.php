<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;

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
      $records=Record::where('user_id','=', auth()->user()->id)->orderBy('id', 'desc')->limit(1)->get();
      $charts=Record::where('user_id','=', auth()->user()->id)->orderBy('id', 'asc')->limit(20)->get();
      //dd($records);
      return view ('records.create', ['records'=>$records, 'charts'=>$charts]);
    }
    public function search()
    {

      return view ('records.search', ['records'=>null]);
    }

    public function show(Request $request)
    {
        //
        //dd(auth()->user()->id);
        $records=Record::where('user_id','=', auth()->user()->id )->where('device', '=', $request->code)->orderBy('created_at', 'desc')->limit(1)->get();
        //$last=Record::where('id','>', 0)->orderBy('created_at', 'desc')->limit(1)->get();
        //dd($records);
        $charts=Record::where('user_id','=', auth()->user()->id)->where('device', '=', $request->code)->orderBy('id', 'asc')->limit(20)->get();
        return view ('records.show', ['records'=>$records, 'charts'=>$charts]);
    }
}
