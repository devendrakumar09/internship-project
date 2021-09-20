@extends('Admin.Layout.app') 
@section('meta-data')
    
@endsection 

@section('external-css')
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
@endsection

@section('external-js')
@show