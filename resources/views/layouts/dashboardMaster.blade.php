<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{$title}}</title>
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('assets/css/dtables.css')}}">
        <script src="{{asset('assets/js/axios.min.js')}}"></script>

                <!-- Bootstrap core JS-->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
                  <!-- Core theme JS-->
        <script src="{{asset('assets/js/scripts.js')}}"></script>
        <script src="{{asset('assets/js/jquery.js')}}"></script>
        <script src="{{asset('assets/js/dtables.js')}}"></script>

    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Assignment 22</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('/dashboard')}}">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('/customer')}}">Customer</a>

                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('/shop-owner-logout')}}">Logout</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom" style="min-height: 58px; display:flex; justify-content:space-around;">
          
                    <div class="col-md-4">
                        <span><h4 style="margin-left:20px; padding:0 5px;">{{$title}}</h4></span>
                    </div>
                
                    <div class="col-md-6">
                        <span class="text-center">Welcome - {{$shopOwnerName->firstName}}   {{$shopOwnerName->lastName}}</span>
                    </div>

                    <div class="col-md-2">
                        <span> &nbsp;&nbsp;&nbsp;  <a href="{{url('/shop-owner-logout')}}">Logout</a></span>
                    </div>

                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    
                    @yield('content')
                </div>
            </div>
        </div>

      
    </body>
</html>
