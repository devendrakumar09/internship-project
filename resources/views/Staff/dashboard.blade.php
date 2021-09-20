@extends('Staff.Layout.app') 
@section('meta-data')
    
@endsection 

@section('external-css')
<style>
</style >

@endsection  
@section('main-content')

@section('page-heading')
<h3 class="font-weight-bolder">Patient</h3>
@endsection

@section('page-links')
<a href="{{route('patient.index')}}" class="btn btn-outline-success ">Patient</a>
<a href="{{route('patient.create')}}" class="btn btn-outline-primary ">Create</a>
@endsection

<div class="container patient">
    <div class="row">
        <div class="col-sm-11 mx-auto">
            <div class="card table-card border-0 mb-4">
                <div class="card-body">
                    @if(isset($patients) && $patients->count() > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                
                                <th scope="col">Name</th>
                                <th scope="col">Number</th>
                                <th scope="col">Age</th>
                                <th scope="col">Created Date</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                    <tr>
                                        
                                        <td>{{ucfirst($patient->name)}}</td>
                                        <td>{{$patient->number}}</td>
                                        <td>{{$patient->age}}</td>
                                        <td>{{$patient->created_at->diffForHumans()}}</td>                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="links mt-4 text-center">
                            {{$patients->links()}}
                        </div>
                    @else
                        <span class="bg-danger text-white p-4 h3">Data Not Found</span>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('external-js')
@show