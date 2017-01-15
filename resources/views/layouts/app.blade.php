<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>{{ config('app.name', 'ITS Maker') }}</title>

    <!-- Styles -->
    
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>


    </script>


    
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/272207c0c4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'ITS Maker') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            
                            <!-- <form id="search-pro-form" class="navbar-form navbar-left" action="{{ URL::to('searchPro') }}" method="POST">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="input-group">
                                  <input type="text" class="form-control" id="pro_search_button" name="id" placeholder="PRO #">
                                  <span class="input-group-btn"><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></span>
                                  </div>
                                
                                </div>
                                
                                
                            </form> -->
                            <li><a href="{{ URL::to('/notes') }}">Notes</a></li>
                            <li><a href="{{ URL::to('/displayLoads') }}">Loads</a></li>
                            <li><a href="{{ url('/home') }}">New Invoice</a></li>
                            <li><a href="{{ URL::to('/newLocation') }}">New Location</a></li>
                            <li><a href="{{ URL::to('/newEquipment') }}">New Equipment</a></li>
                            
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Carriers <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                <li><a href="{{ URL::to('/newCarrier') }}">New Carrier</a></li>
                                <li><a href="{{ URL::to('/findCarrier') }}">Find Carrier</a></li>
                                <li><a href="{{ URL::to('/findTrucks') }}">Find Trucks From Carriers</a></li>
                                <li><a href="{{ URL::to('/findTrucksFromLoads') }}">Find Trucks From Loads</a></li>
                                

                                </ul>


                            </li>

                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Customers <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                <li><a href="{{ URL::to('/newCustomer') }}">New Customer</a></li>
                                <li><a href="{{ URL::to('/findCustomer') }}">Find Customer</a></li>
                                
                                

                                </ul>


                            </li>

                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Load Status <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                <li><a href="{{ URL::to('/toBeLoaded') }}">To Be Loaded</a></li>
                                <li><a href="{{ URL::to('/toBeDelivered') }}">To Be Delivered</a></li>
                                

                                </ul>


                            </li>
                            @if (Auth::user()->admin)
                                

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span>
                                    </a>

                                <ul class="dropdown-menu" role="menu">

                                <li><a href="{{ url('/admin') }}">Company Snapshot</a></li>
                                <li><a href="{{ url('/getProfitReport') }}">Profit Report</a></li>
                                <li><a href="{{ url('/exportCustomerInvoices') }}">Export Customer Invoices</a></li>
                                <li><a href="{{ url('/exportCarrierBills') }}">Export Carrier Bills</a></li>
                                
                                

                                </ul>


                            </li>

                            @endif
                            
                            
                            
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                 {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ URL::to('/myStats') }}">My Stats</a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
@include ('footer')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/all.js"></script>
    <script src="/js/datepicker.js"></script>
    <script src="/js/main.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
</body>
</html>
