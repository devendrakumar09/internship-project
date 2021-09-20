<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $staff = User::where('role_id',2)->orderBy('created_at','ASC')->simplePaginate(10);
        return view('Admin.Staff.staff')
                        ->with('staff',$staff);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'mob' => 'required|min:11|numeric',            
        ]);
        
        $staff = new User; 
        $staff->role_id = 2;
        $staff->name = $request->name;
        $staff->number = $request->mob;
        $staff->email = $request->email;
        $staff->password = Hash::make($request->password);
        $staff->save();
        if ($staff) {
            return redirect()->route('staff.index')->with('message','1 Row Inserted...');
        }else {
            return back()->with('message','Some Error....');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = User::find($id);
        return view('Admin.Staff.edit')
                    ->with('staff',$staff);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'mob' => 'required|min:11|numeric',            
        ]);
        $staff = User::find($id);         
        $staff->name = $request->name;
        $staff->number = $request->mob;
        $staff->email = $request->email;
        $staff->password = Hash::make($request->password);
        $staff->save();
        if ($staff) {
            return redirect()->route('staff.index')->with('message','1 Row Updated..');
        }else {
            return back()->with('message','Some Error....');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = User::find($id);
        if ($staff) {
            $staff->delete();
            return back()->with('message','1 Row Deleted');
        }else {
            return back()->with('message','Data Not Found');
        }
    }
}
