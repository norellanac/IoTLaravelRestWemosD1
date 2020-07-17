<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    use HasRoles;
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view("users.index",["users"=>$users,"roles"=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = new User;
        $roles = Role::all();
        return view("users.create",["users"=>$users,"roles"=>$roles]);
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
            'role_id'=>'required',
            'password'=>'required'
        ]);
        //encontrar y asignar rol de Spatie
        $roleName = Role::find($request->role_id); //obtiene el roll desde la base de datos

        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->role_id = $request->role_id;
        $users->password = bcrypt($request->password);

        if($users->save()){
            //fincion que remueve roles asignados previamente y agrega el rol indicado
            $users->syncRoles([$roleName->name]);
            return redirect("/users");
        }else{
            return view ("users.create");
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
        $users = User::findOrFail($id);
        return view("users.show",["users"=>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::all();
        return view("users.edit",["users"=>$users,"roles"=>$roles]);
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
            'role_id'=>'required'
        ]);
        $users = User::find($id);
        //encontrar y asignar rol de Spatie
        $roleName = Role::find($request->role_id); //obtiene el roll desde la base de datos
        
        //fincion que remueve roles asignados previamente y agrega el rol indicado
        $users->syncRoles([$roleName->name]);

        $users->name = $request->name;
        $users->email = $request->email;
        $users->role_id = $request->role_id;

        if($request->password <> '' && $request->password2 <> ''){
            if($request->password === $request->password2){
                $newpass=bcrypt($request->password);
                $users->password = $newpass;
            }else{
                $request->session()->flash('alert-danger', 'Las contraseñas no coinciden, favor intente nuevamente');
            }
        }

        if($users->save()){
            return redirect("/users/".$users->id);
        }else{
            $request->session()->flash('alert-danger', 'No se procesaron los datos');
            return redirect("/users/".$id);
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
