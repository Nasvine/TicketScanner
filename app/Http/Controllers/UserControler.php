<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserControler extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        $roles = Role::all();
        //dd($users);
        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        #dd($request->all());
        $validation = $request->validate([
            "first_name"             => "required",
            "last_name"              => "required",
            "email"                  => "required",
            "role_id"                => "required",
            "password"               => "required",
        ]);

        $tab_user = array(
            'first_name'         =>  $validation['first_name'],
            'last_name'          =>  $validation['last_name'],
            'email'                 =>  $validation['email'],
            'password'              =>  Hash::make($validation['password']),
            'role_id'               =>  $validation['role_id'],
        );

        //dd($tab_user);

        $user = User::create($tab_user);

        Alert::success('Insection', 'Utilisateur créé(e) avec succès.');
        return to_route('user.admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit',compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user_id = User::find($id);
        $validation = $request->validate([
            "first_name"             => "required",
            "last_name"              => "required",
            "email"                  => "required",
            "role_id"                => "required",
            "password"               => "required",
        ]);

            $tab_user = array(
                'first_name'         =>  $validation['first_name'],
                'last_name'          =>  $validation['last_name'],
                'email'                 =>  $validation['email'],
                'password'              =>  Hash::make($validation['password']),
                'role_id'               =>  $validation['role_id'],
            );
        
            $user_simple = User::find($id);
            $user_simple->update($tab_user);;

       Alert::success('Modification', 'Utilisateur modifié(e) avec succès.');
       return to_route('user.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        User::find($id)->delete();
        Alert::success('Suppression', 'Utilisateur supprimé(e) avec succès.');
        return to_route('user.admin.index');
    }
}
