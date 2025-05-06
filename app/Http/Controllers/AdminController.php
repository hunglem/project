<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\RoleServiceprovider;
use App\Models\User;
use App\Models\Role;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function AdminProfile()
    {
        $id = Auth::user();
        $profileData = User::find($id->id);
        return view('admin.admin_profile', compact('profileData'));
    }

}
