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
<h3 class="font-weight-bolder">staff</h3>
@endsection

@section('page-links')
<a href="{{route('staff.index')}}" class="btn btn-outline-success ">staffs</a>
<a href="{{route('staff.create')}}" class="btn btn-outline-primary ">Create</a>
@endsection

<div class="container-flude create-form">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card">
                    <form method="POST" action="{{route('staff.update',$staff->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="p-3 border-bottom d-flex align-items-center justify-content-center ">
                            <h2 class="font-weight-bolder form-heading">Edit staff</h2>
                        </div>        
                        <div class="p-3 px-4 py-4 border-bottom">
                            <label for="full-name">Full Name</label>
                            <input id="full-name" type="text" class="form-control"  autofocus placeholder="Full Name" name="name" value="{{$staff->name}}">

                            <div class="form mt-4">
                                <label for="mob">Mobile</label>
                                <input id="mob" type="text" class="form-control"  placeholder="Mobile Number" name="mob" value="{{$staff->number}}">
                            </div> 
                            
                            <div class="form mt-4">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control"  placeholder="Email" name="email" value="{{$staff->email}}">
                            </div> 

                            <div class="form mt-4">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control"  placeholder="Password" name="password" value="{{$staff->password}}">
                            </div> 

                            <button type="submit" class="btn btn-block text-white continue">Update</button>
                            
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