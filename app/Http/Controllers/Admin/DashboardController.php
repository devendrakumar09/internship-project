<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Branch;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        $doctors = User::where('role_id',1)->get();
        $staff = User::where('role_id',2)->get();
        return view('Admin.dashboard')
                        ->with('doctors',$doctors)
                        ->with('branches',$branches)
                        ->with('staff',$staff);
    }
}
