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
<div class="container branches">
    <div class="row">
        <div class="col-sm-11 mx-auto">
            <div class="card table-card border-0 mb-4">
                <div class="card-body">
                    @if(isset($branches) && $branches->count() > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount Per Patient</th>
                                <th scope="col">Created Date</th>
                                <th scope="col" colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($branches as $branch)
                                    <tr>
                                        <th scope="row">{{$branch->id}}</th>
                                        <td>{{ucfirst($branch->name)}}</td>
                                        <td>{{$branch->amountPerPatient}}</td>
                                        <td>{{$branch->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{route('branch.edit',$branch->id)}}" class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{route('branch.destroy',$branch->id)}}" method="post">
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
                            {{$branches->links()}}
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