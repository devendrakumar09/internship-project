@extends('Staff.Layout.app') 
@section('meta-data')
    
@endsection 

@section('external-css')
<link rel="stylesheet" href="{{asset('Admin/css/create-form.css')}}">
<style>
</style >

@endsection  
@section('main-content')
@section('page-heading')
<h3 class="font-weight-bolder">Patient</h3>
@endsection

@section('page-links')
<a href="{{route('patient.index')}}" class="btn btn-outline-success ">patients</a>
<a href="{{route('patient.create')}}" class="btn btn-outline-primary ">Create</a>
@endsection

<div class="container-flude create-form">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card">
                    <form method="POST" action="{{route('patient.store')}}">
                        @csrf
                        <div class="p-3 border-bottom d-flex align-items-center justify-content-center ">
                            <h2 class="font-weight-bolder form-heading">Create New</h2>
                        </div>        
                        <div class="p-3 px-4 py-4 border-bottom">
                            <label for="full-name">Full Name</label>
                            <input id="full-name" type="text" class="form-control"  autofocus placeholder="Full Name" name="name">

                            <div class="form mt-4">
                                <label for="mob">Mobile</label>
                                <input id="mob" type="text" class="form-control"  placeholder="Mobile Number" name="number">
                            </div> 
                            <div class="form mt-4">                                
                                <label for="DOB">Age</label>
                                <select name="age" id="" class="form-control" >
                                    <option value="">Select</option>
                                    @for ($i = 1; $i < 150; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                    <option value=""></option>
                                </select>                                
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