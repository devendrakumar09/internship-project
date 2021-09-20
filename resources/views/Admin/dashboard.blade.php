@extends('Admin.Layout.app') 
@section('meta-data')
    
@endsection 

@section('external-css')
<style>

</style >

@endsection  
@section('main-content')
@section('page-heading')
<h3 class="font-weight-bolder"> Admin Dashboard</h3>
@endsection
<div class="container dashboard">
    <div class="row">

        <div class="col-sm-4">
            <div class="card-border-0 shadow p-2 quick-card bg-white mb-2">
                <div class="card-body">
                    <h3 class="card-heading font-weight-bolder">Branches</h3>
                    <p class="card-text small">These cuties will need a new place where thay can live with their owner.</p>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-start align-items-center"> 
                            <a href="{{route('branch.index')}}" class="btn btn-sm btn-outline-success rounded px-4">Explore</a>
                        </div>
                        <div class="d-flex justify-content-end"> 
                            {{$branches->count()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card-border-0 shadow p-2 quick-card bg-white mb-2">
                <div class="card-body">
                    <h3 class="card-heading font-weight-bolder">Staff</h3>
                    <p class="card-text small">These cuties will need a new place where thay can live with their owner.</p>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-start align-items-center"> 
                            <a href="{{route('staff.index')}}" class="btn btn-sm btn-outline-success rounded px-4">Explore</a>
                        </div>
                        <div class="d-flex justify-content-end"> 
                            {{$staff->count()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card-border-0 shadow p-2 quick-card bg-white mb-2">
                <div class="card-body">
                    <h3 class="card-heading font-weight-bolder">Doctors</h3>
                    <p class="card-text small">These cuties will need a new place where thay can live with their owner.</p>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-start align-items-center"> 
                            <a href="{{route('doctor.index')}}" class="btn btn-sm btn-outline-success rounded px-4">Explore</a>
                        </div>
                        <div class="d-flex justify-content-end"> 
                            {{$doctors->count()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('external-js')
@show