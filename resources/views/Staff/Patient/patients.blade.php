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
<a href="{{route('patient.index')}}" class="btn btn-outline-success ">Patients</a>
<a href="{{route('patient.create')}}" class="btn btn-outline-primary ">Create</a>
@endsection 
<div class="container Patients">
    <div class="row">
        <div class="col-sm-11 mx-auto">
            <div class="card table-card border-0">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('external-js')
@show