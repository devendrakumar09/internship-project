<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::select('id','created_at')->get()->groupBy(
            function($data){
                return Carbon::parse($data->created_at)->format('M');
            }
        );
        $month = [];
        $monthCount = [];
        foreach ($users as $key => $value) {
            $month[] = $key;
            $monthCount[] = count($value);
        }
        return view('Doctor.dashboard')
                        ->with('patient',$users)
                        ->with('month',$month)
                        ->with('monthCount',$monthCount);
    }
}
