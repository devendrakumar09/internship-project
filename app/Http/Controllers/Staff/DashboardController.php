<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Patient;

class DashboardController extends Controller
{
    public function index()
    {
        $patients = Patient::orderBy('created_at','DESC')->simplePaginate(10);
        return view('Staff.dashboard')
                        ->with('patients',$patients);
    }
}
