<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;

class AdministrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function getAdministrationView()
    {
        $nonAdminUsers = User::get();
        return view('administration', [
            'users' => $nonAdminUsers, 'roles'=>Role::get()
        ]);
    }

    public function getRolesView()
    {
        return view('roles', [
            'roles'=>Role::get()
        ]);
    }

    public function roleEdit(Role $role)
    {
        return view('roleEdit', [
            'role' => $role,
        ]);
    }

    public function newRole()
    {
        return view('roleNew');
    }

    public function roleInsert(Request $request)
    {
        $role = new Role;
        $role->name = $request->name;
        $role->save();
        return redirect('/roles');
    }

    public function roleSave(Request $request, Role $role)
    {
        $role->name = $request->name;
        $role->save();
        return redirect('/roles');
    }

    public function roleDelete(Request $request,  Role $role)
    {
        $role->delete();
        return redirect('/roles');
    }
}
