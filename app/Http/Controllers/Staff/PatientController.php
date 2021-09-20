<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('staff-dashboard');        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Staff.Patient.create');
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
            'number' => 'required|min:11|numeric',
            'age' => 'required',
        ]);

        $patient = new Patient; 
        $patient->user_id = Auth::user()->id;
        $patient->name = $request->name;
        $patient->number = $request->number;
        $patient->age = $request->age;
        $patient->slug = Str::random(5).'-'.Str::random(5).'-'.time();
        
        $patient->save(); 
        if ($patient) {
            return redirect()->route('patient.index')->with('message','1 Row Inserted...');
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
        
        $patient = Patient::find($id);
        return view('Staff.Patient.edit')
                    ->with('staff',$patient);
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
            'number' => 'required|min:11|numeric',
            'age' => 'required',
        ]);
        
        $patient = Patient::find($id); 
        $patient->name = $request->name;
        $patient->number = $request->number;
        $patient->age = $request->age;

        $patient->save();
        if ($patient) {
            return redirect()->route('patient.index')->with('message','1 Row Updated..');
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
        $patient = Patient::find($id);
        if ($patient) {
            $patient->delete();
            return back()->with('message','1 Row Deleted');
        }else {
            return back()->with('message','Data Not Found');
        }
    }
}
