<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dr = User::where('role_id',1)->orderBy('created_at','ASC')->simplePaginate(10);
        return view('Admin.Doctor.doctors')
                        ->with('doctors',$dr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Doctor.create');
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

        $dr = new User; 
        $dr->role_id = 1;
        $dr->name = $request->name;
        $dr->number = $request->mob;
        $dr->email = $request->email;
        $dr->password = Hash::make($request->password);
        $dr->save();
        if ($dr) {
            return redirect()->route('doctor.index');
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
        $dr = User::find($id);
        return view('Admin.Doctor.edit')
                    ->with('doctor',$dr);
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
        $dr = User::find($id);         
        $dr->name = $request->name;
        $dr->number = $request->mob;
        $dr->email = $request->email;
        $dr->password = Hash::make($request->password);
        $dr->save();
        if ($dr) {
            return redirect()->route('doctor.index')->with('message','1 Row Updated..');
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
        $dr = User::find($id);
        if ($dr) {
            $dr->delete();
            return back()->with('message','1 Row Deleted');
        }else {
            return back()->with('message','Data Not Found');
        }
    }
}
