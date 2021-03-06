<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>ACH Info</title>

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


<div class="container">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h3 class="text-center"><u>Secure ACH Payment Information Form</u></h3>

    {!! Form::open(['url' => route('hauler.ach.process', ['token' => $carrier->ach_token])]) !!}
    
    
    <div class="row">
        <div class="col-md-4">
            {{ Form::label('bank_name', 'Bank Name') }}
            {{ Form::text('bank_name', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-4">
            {{ Form::label('account_name', 'Account Name (full name used with bank)') }}
            {{ Form::text('account_name', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-4">
            {{ Form::label('account_type', 'Account Type') }}
            {{ Form::select('account_type', 
                [
                    'Checking' => 'Checking',
                    'Saving' => 'Saving',
                ], null, ['placeholder' => 'Pick an account type...', 'class' => 'form-control']) }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            {{ Form::label('routing_number', 'Routing Number') }}
            {{ Form::text('routing_number', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-4">
            {{ Form::label('account_number', 'Account Number') }}
            {{ Form::text('account_number', null, ['class' => 'form-control']) }}
        </div>
    </div>

   {{ Form::submit('Submit', ['class' => 'form-control btn btn-primary', 'style' => 'margin-top: 15px;']) }}

    {!! Form::close() !!}


    <h3 class="text-center">ACH PAYMENT AUTHORIZATION</h3>
    <p>I hereby authorize International Transport Systems, Inc. (hereinafter referred to as the ITS) to initiate credit entries and to initiate, if necessary, debit entries and adjustments for any credit entry originated in error, to my (our) account at the financial institution named below, hereinafter called DEPOSITORY, to credit and/or debit the same to such amount. This authority shall remain in full force and effect until ITS has received written notification from you (or either of us) of its termination in such time and in such manner as to afford ITS and DEPOSITORY a reasonable opportunity to act upon it. If the banking information changes please contact us immediately at 630-833-1618 or lianey@itransys.com.</p>


</div>
</body>
</html>