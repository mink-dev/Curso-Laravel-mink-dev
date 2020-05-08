<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\User;
use App\Http\Requests\UpdateRequestUsers;
use App\Role;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
         $this->middleware('auth',['except' => 'show']);
         $this->middleware('roles:admin',['except' => ['edit','update','show']]);
     //    $this->middleware('roles');
    }


    public function index()
    {
        $users = \App\User::with(['roles', 'note', 'tags'])->get();   
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name', 'id');
        // return view('users.create', compact('user', 'roles'));
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CreateUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->attach($request->roles);

        return  redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $usr = User::findOrFail($id);
          
            $this->authorize('edit',$usr);

            $roles = Role::pluck('display_name', 'id');

        return view('users.edit', compact('usr', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequestUsers $request, $id)
    {
       
            $user = User::findOrFail($id); 

            $this->authorize('update', $user);
            
            $user->update($request->only('name', 'email'));
        
            $user->roles()->sync($request->roles);

        return back()->with('info', 'Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // return redirect()->route('users.show');
        $users = \App\User::with(['roles', 'note', 'tags'])->get();   
        return view('users.index', compact('users'));
    }
}
