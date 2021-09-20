<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::orderBy('created_at','ASC')->simplePaginate(10);
        return view('Admin.Branch.branches')
                        ->with('branches',$branches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Branch.create');
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
            'branch_name' => 'required|max:255',
            'amount_of_patient' => 'required',
        ]);

        $branch = new Branch;
        $branch->user_id = Auth::user()->id;
        $branch->name = $request->branch_name;
        $branch->amountPerPatient = $request->amount_of_patient;
        $branch->slug = Str::random(5).'-'.Str::random(5).'-'.time();
        $branch->save();
        if ($branch) {
            return redirect()->route('branch.index')->with('1 Row Inserted!!!');
        }else {
            return back()->with('Error');
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
        $branch = Branch::find($id);
        return view('Admin.Branch.edit')
                        ->with('branch',$branch);

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
            'branch_name' => 'required|max:255',
            'amount_of_patient' => 'required',
        ]);
        
        $branch =  Branch::find($id);
        $branch->user_id = Auth::user()->id;
        $branch->name = $request->branch_name;
        $branch->amountPerPatient = $request->amount_of_patient;        
        $branch->save();
        if ($branch) {
            return redirect()->route('branch.index')->with('1 Row Inserted!!!');
        }else {
            return back()->with('Error');
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
        $branch = Branch::find($id);
        if ($branch) {
            $branch->delete();
            return back()->with('message','1 Row Deleted');
        }else {
            return back()->with('message','Data Not Found');
        }
    }
}
