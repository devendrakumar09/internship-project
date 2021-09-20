<div class="container-flude  bg-white shadow mb-4">
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light">             
            <button type="button" id="sidebarCollapse" class="btn btn-outline-dark"> 
                <i class="fa fa-align-justify"></i> 
            </button> 
            <span class="font-weight-bolder ml-2 h3 mt-2 bg-warning px-2 py-2 rounded">Admin</span>
                <div class="text-right ml-auto mr-4">
                    @if(Auth::guest())                                           
                        <a class="btn btn-outline-dark ms-md-4" href="{{ route('login') }}"><i class="fa fa-user-circle mr-1"></i> Log In </a>                                  
                        @else
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('admin-dashboard') }}">
                                    Dashboard
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                
                            </div>
                        </div>
                    @endif  
                </div>
        </nav>
    </div>
</div>