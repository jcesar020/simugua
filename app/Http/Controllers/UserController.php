<?php

namespace simuaagua\Http\Controllers;

use Illuminate\Http\Request;

use simuaagua\Http\Requests;
use simuaagua\Http\Requests\userCreateRequest;
use simuaagua\Http\Requests\userUpdateRequest;
use simuaagua\Http\Controllers\Controller;
use Session;
use Redirect;
use simuaagua\User;
use Illuminate\Routing\Route;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
        $this->beforeFilter('@find', ['only' =>['edit', 'update', 'destroy']]);
    }

    public function find(Route $route){
        $this->user=User::find($route->getParameter('usuario'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        //return $users;
        return view('usuario.index', compact('users'));
    }

    public function inituser(){
        $users=User::all();
        //return $users;
        return view('usuario.index_simple', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userCreateRequest $request)
    {
       //return $request->all();
        //User::create($request->all());
        User::create([
            'usuario'=>$request['usuario'],
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>$request['password'],
            'admin'=>$request['admin']
        ]);
        return redirect('/usuario')->with('message', 'Usuario creado correctamente');
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
        $user= User::find($id);
        //return $users;
        return view('usuario.edit', ['user'=>$user]);
    }

    public function initedit($id)
    {
        $user= User::find($id);
        //return $users;
        return view('usuario.edit', ['user'=>$user]);
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
        $user=User::find($id);
        $user->fill($request->all());
        $user->save();
        return redirect('/usuario')->with('message', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/usuario')->with('message', 'Usuario eliminado correctamente');
    }

}
