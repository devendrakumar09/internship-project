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
<h3 class="font-weight-bolder">Doctor</h3>
@endsection

@section('page-links')
<a href="{{route('doctor.index')}}" class="btn btn-outline-success ">Doctors</a>
<a href="{{route('doctor.create')}}" class="btn btn-outline-primary ">Create</a>
@endsection

<div class="container-flude create-form">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{route('doctor.store')}}">
                        @csrf
                        <div class="p-3 border-bottom d-flex align-items-center justify-content-center ">
                            <h2 class="font-weight-bolder form-heading">Create New</h2>
                        </div>        
                        <div class="p-3 px-4 py-4 border-bottom">
                            <label for="full-name">Full Name</label>
                            <input id="full-name" type="text" class="form-control"  autofocus placeholder="Full Name" name="name">

                            <div class="form mt-4">
                                <label for="mob">Mobile</label>
                                <input id="mob" type="text" class="form-control"  placeholder="Mobile Number" name="mob">
                            </div> 
                            
                            <div class="form mt-4">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control"  placeholder="Email" name="email">
                            </div> 

                            <div class="form mt-4">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control"  placeholder="Password" name="password">
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