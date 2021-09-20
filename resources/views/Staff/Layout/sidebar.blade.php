<nav id="sidebar">
        <div class="sidebar-header">
            <h3> <a href="{{route('admin-dashboard')}}">Dashboard</a></h3>
            <hr>
        </div>
        <ul class="list-unstyled components ml-2">            
            <li> 
                <a href="{{route('patient.index')}}">Patient</a> 
            </li> 
            
        </ul>
        <ul class="list-unstyled CTAs">
            <li> <a href="{{url()->previous()}}" class="download ">Back</a> </li>
        </ul>
    </nav>