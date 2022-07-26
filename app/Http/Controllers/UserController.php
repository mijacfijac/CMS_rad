<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function updateUserRole(Request $request, $user_id) {
        $user = User::find($user_id);

        $user->role_id=$request->role;
        $user->save();

        return redirect('/administrations');
    }
}
