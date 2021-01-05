<?php

namespace App\Http\Controllers;
use App\Area;
use App\Status_area;
use App\Company;
use DB;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        $status_areas = Status_area::all();
        return view("area.index", ["areas" => $areas, 'status_areas'=> $status_areas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status_areas = Status_area::all();
        $companies = Company::all();
        $areas = new Area;
        //dd($companies);
        return view("area.create", ['areas'=> $areas, 'status_areas'=> $status_areas, 'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'description'=>'required',
            'company_id'=>'required',
            'status_id'=>'required'
        ]);

        $areas = new Area;
        $areas->description = $request->description;
        $areas->company_id = $request->company_id;
        $areas->status_id = $request->status_id;
        
        if($areas->save()){
            return redirect("/area");
        }else{
            return view ("area.create");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $areas = Area::findOrFail($id);
        if (is_null($areas)) {
            return abort(404);
        }
        else{
            return view("area.show",["areas"=>$areas]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $areas = Area::findOrFail($id);
        $status_areas = Status_area::all();
        $companies = Company::all();
        return view("area.edit", ['areas'=> $areas, 'status_areas'=> $status_areas, 'companies'=> $companies]);
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
        request()->validate([
            'description'=>'required',
            'company_id'=>'required',
            'status_id'=>'required'
        ]);

        $areas = Area::find($id);
        $areas->description = $request->description;
        $areas->company_id = $request->company_id;
        $areas->status_id = $request->status_id;
        
        if($areas->save()){
            return redirect("/area");
        }else{
            return view ("area.edit");
        }
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
