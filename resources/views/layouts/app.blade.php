<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(isset($title))
    <title>{{ $title }}</title>
    @else
    <title>ITS Maker</title>
    @endif
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
@include ('footer')
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
                            <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                        @else


                            <li><a href="{{ URL::to('/start_bidboard') }}">Bid Board</a></li>
                            <li><a href="{{ URL::to('/loadlist') }}">Load List</a></li>
                            <!-- <li><a href="{{ URL::to('/notes') }}">Reference</a></li> -->



                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Search Loads <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                <li><a href="{{ URL::to('/displayLoads') }}">Last 2000 Records</a></li>
                                <li><a href="{{ URL::to('/deepSearchLoads') }}">Last 2000 through 5000</a></li>
                                <li><a href="{{ URL::to('/deepDeepSearchLoads') }}">Last 5000 through 10000</a></li>



                                </ul>


                            </li>


                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">New <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                <li><a href="{{ url('/home') }}">New Invoice</a></li>
                                <li><a href="{{ URL::to('/newLocation') }}">New Location</a></li>
                                <li><a href="{{ URL::to('/newEquipment') }}">New Equipment</a></li>


                                </ul>


                            </li>





                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Carriers <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ URL::to('/emailSetUp') }}">Set Up Form</a></li>
                                <li><a href="{{ URL::to('/fastCarrierSetUp') }}">Fast Carrier Entry</a></li>
                                <li><a href="{{ URL::to('/hauler') }}">New Carrier</a></li>
                                <li><a href="{{ URL::to('/findHauler') }}">Find Carrier</a></li>
                                <!-- <li><a href="{{ URL::to('/newCarrier') }}">New Carrier</a></li>
                                <li><a href="{{ URL::to('/newcar') }}">New</a></li>
                                <li><a href="{{ URL::to('/findCarrier') }}">Find Carrier</a></li> -->
                                <li><a href="{{ URL::to('/findTrucks') }}">Find Trucks From Carriers</a></li>
                                <li><a href="{{ URL::to('/findTrucksFromLoads') }}">Find Trucks From Loads</a></li>
                                <li><a href="{{ URL::to('/generateTextList') }}">Generate Text List</a></li>
                                <li><a href="{{ URL::to('/deleteViaEmail') }}">Delete Email</a></li>


                                </ul>


                            </li>

                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Customers <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                <li><a href="{{ URL::to('/newCustomer') }}">New Customer</a></li>
                                <li><a href="{{ URL::to('/findCustomer') }}">Find Customer</a></li>
                                <li><a href="{{ URL::to('/biWeeklyCustomerEmailList') }}">Customer Email List</a></li>



                                </ul>


                            </li>

                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Load Status <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                <li><a href="{{ URL::to('/toBeLoaded') }}">To Be Loaded</a></li>
                                <li><a href="{{ URL::to('/toBeDelivered') }}">To Be Delivered</a></li>
                                <li><a href="{{ URL::to('/toBeAvailable') }}">To Be Available</a></li>


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
                                <li><a href="{{ url('/budget') }}">Monthly Budget</a></li>
                                
                                



                                </ul>


                            </li>

                            @endif


                             @if (Auth::user()->accounting)


                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Accounting <span class="caret"></span>
                                    </a>

                                <ul class="dropdown-menu" role="menu">
                                    
                                    <li><a href="{{ url('/accounts_receivable') }}">Receivables</a></li>
                                    <li><a href="{{ url('/accounts_payable') }}">Payables</a></li>
                                    <li><a href="{{ url('/customer_accounting') }}">Customer Search</a></li>
                                    <li><a href="{{ url('/carrier_accounting') }}">Carrier Search</a></li>
                                    <li><a href="{{ URL::to('/remit') }}">Billing Info Data</a></li>
                                    <li><a href="{{ url('/achCSV') }}">Create ACH Files</a></li>
                                    <!-- <li><a href="{{ url('/positivePay') }}">Create Positive Pay</a></li> -->
                                    <li><a href="{{ url('/generalLedgerFiles') }}">Generate Files</a></li>
                                    <!-- <li><a href="{{ url('/allNeededPODs') }}">Needed BOL</a></li> -->
                                    
                                    @if (Auth::user()->email == 'mikec@itransys.com' || Auth::user()->email == 'lianey@itransys.com')
                                    <li><a href="{{ url('/general_ledger') }}">Transactions</a></li>
                                    <!-- <li><a href="{{ url('/newAccountingDatatable') }}">Checking Account</a></li> -->
                                    <li><a href="{{ url('/journal') }}">Journal Form and Data</a></li>
                                    <li><a href="{{ url('/journalAccountSearch') }}">Specific Accounts</a></li>
                                    <li><a href="{{ url('/journalGeneralAccountSearch') }}">General Accounts</a></li>
                                    @endif
                               
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
    <!-- Scripts -->
<script src="/js/app.js"></script>
<script src="/js/all.js"></script>
    <script src="/js/datepicker.js"></script>
    <script src="/js/main.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
</body>
</html>
