<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all()
        ->sortBy('id');

        return view('/dashboard/users', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating/updating a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function form(Request $request)
    {
        //
        $userRoles =  UserRole::all()
        ->sortBy('id');

        //find existing user
        if ($request->id != "new") {
            $user = User::where('id', $request->id)
                ->first();
        } else {
        //new user
            $user = new User;
        }

        //return data with view
        return view('/dashboard/user', [
            'user' => $user,
            'user_roles' => $userRoles
        ]);
    }

    /**
     * Save or update a user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
        ];

        //save, destroy or update
        switch (true) {
            case ($request->action === "delete"):
                return  $this->destroy($request->id);
                break;
            case ($request->id === 'new'):
                $user = new User( $user_data);
                $user->save();
                break;
            default:
                $user =  User::updateOrCreate(['id' => $request->id], $user_data);
        }

        return redirect('/dashboard/user/' . $user->id);
    }


    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect('/dashboard/users');
    }
}
