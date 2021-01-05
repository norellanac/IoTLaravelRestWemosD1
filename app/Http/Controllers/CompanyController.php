<?php

namespace App\Http\Controllers;
use App\Company;
use App\Status_company;
use DB;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
        $status_company = Status_company::all();
        return view("company.index", ["company" => $company, 'status_company'=> $status_company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status_company = Status_company::all();
        $company = new Company;
        return view("company.create", ['company'=> $company, 'status_company'=> $status_company]);
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
            'name'=>'required',
            'email'=>'required',
            'status_id'=>'required'
        ]);

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->status_id = $request->status_id;
        
        if($company->save()){
            return redirect("/company");
        }else{
            return view ("company.create");
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
        $company = Company::findOrFail($id);
        if (is_null($company)) {
            return abort(404);
        }
        else{
            return view("company.show",["company"=>$company]);
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
        $status_company = Status_company::all();
        $company = Company::findOrFail($id);
        return view("company.edit", ['company'=> $company, 'status_company'=> $status_company]);
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
            'name'=>'required',
            'email'=>'required',
            'status_id'=>'required'
        ]);

        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->status_id = $request->status_id;
        
        if($company->save()){
            return redirect("/company");
        }else{
            return view ("company.edit");
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
