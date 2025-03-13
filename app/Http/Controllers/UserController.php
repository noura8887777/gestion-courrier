<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view("Users.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=User::with('roles')->get();
        return view("Users.create", compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        DB::table('users')->insert([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>$req->password,
            'role_id'=>$req->role_id,
           
         ]);
         session()->flash('success', 'L\'utilisateur a été ajouté avec succès !');
          return redirect()->route('user.index');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usersDetail=User::with('roles')->findOrFail($id);
        
        // dd($usersDetail);

        return view("Users.show", compact('usersDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userUpdated=User::find($id);
        $roles=Role::all();
        // dd($roles);
        return view("Users.edit", compact("userUpdated","roles"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        DB::table('users')->update([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>$req->password,
            'role_id'=>$req->role_id,
           
         ]);
         session()->flash('success', 'L\'utilisateur a été Modifier avec succès !');
          return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
