@extends('Admin.Layout.app') 
@section('meta-data')
    
@endsection 

@section('external-css')
<style>

</style >

@endsection  
@section('main-content')
@section('page-heading')
<h3 class="heading font-weight-bolder">Staff</h3>
@endsection

@section('page-links')
<a href="{{route('staff.index')}}" class="btn btn-outline-success ">Staffs Members</a>
<a href="{{route('staff.create')}}" class="btn btn-outline-primary ">Create</a>
@endsection
<div class="container branches">
    <div class="row">
        <div class="col-sm-11 mx-auto">
            <div class="card table-card border-0">
                <div class="card-body">
                @if(isset($staff) && $staff->count() > 0 )
                        <table class="table table-hover">
                            <thead>
                                <tr>                                
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Number</th>
                                <th scope="col">Date</th>
                                <th scope="col" class="text-center" colspan="2" >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staff as $sf)
                                    <tr>                                        
                                        <td>{{ucfirst($sf->name)}}</td>
                                        <td>{{$sf->email}}</td>
                                        <td>{{$sf->number}}</td>
                                        <td>{{$sf->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{route('staff.edit',$sf->id)}}" class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{route('staff.destroy',$sf->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>

                        <div class="links mt-4 text-center">
                            
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