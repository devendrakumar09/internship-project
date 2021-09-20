@extends('Admin.Layout.app') 
@section('meta-data')
    
@endsection 

@section('external-css')
<link rel="stylesheet" href="{{asset('Admin/css/create-form.css')}}">
<style>
</style >

@endsection  
@section('main-content')
@section('page-heading')
<h3 class="font-weight-bolder">Branch</h3>
@endsection

@section('page-links')
<a href="{{route('branch.index')}}" class="btn btn-outline-success ">Branches</a>
<a href="{{route('branch.create')}}" class="btn btn-outline-primary ">Create</a>
@endsection

<div class="container-flude create-form">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card">
                    <form  action="{{route('branch.store')}}" method="POST">
                        @csrf
                        <div class="p-3 border-bottom d-flex align-items-center justify-content-center ">
                            <h2 class="font-weight-bolder form-heading">Create New</h2>
                        </div>        
                        <div class="p-3 px-4 py-4 border-bottom">
                            <label for="Branch-name">Branch-name</label>
                            <input id="Branch-name" type="text" class="form-control"  autofocus placeholder="Branch Name..." name="branch_name">
                            <div class="form mt-4">
                                <label for="Amount-per-patient">Amount Per Patient</label>
                                <input id="Amount-per-patient" type="text" class="form-control"  placeholder="Amount Per Patient" name="amount_of_patient">
                            </div> 
                            <button type="submit" class="btn btn-block text-white continue">Create</button>
                            
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('external-js')
@show