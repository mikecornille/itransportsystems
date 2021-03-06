<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h3>Account Entry</h3>
		</div>
		<!-- <div class="col-md-4">
			<a class="btn btn-primary" href="newJournalEntry">Create New Account</a>
		</div>
		<div class="col-md-4">
			<a class="btn btn-primary" href="payMultipleSubCategories">Pay Multiple Credit Card Sub Categories</a>
		</div> -->
	</div>
	<div class="row">
		<div class="col-md-4">
			{{ Form::label('vendorSearchJournal', 'Account Search') }}
	  		{{ Form::text('vendorSearchJournal', null, ['class' => 'form-control', 'placeholder' => 'Account Search']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('account_name', 'Account Name') }}
			{{ Form::text('account_name', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('account_id', 'Account ID') }}
			{{ Form::text('account_id', null, ['class' => 'form-control']) }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			{{ Form::label('type', 'Type') }}
	  		{{ Form::select('type', 
				[

					'PMT' => 'PMT',
					'BILLPMT' => 'BILLPMT'
					
					
	  		
				], null, ['placeholder' => 'Pick a type...', 'class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('type_description', 'Type Description') }}
	  		{{ Form::select('type_description', 
				[
					
					'Asset' => 'Asset',
					'Liability' => 'Liability',
					'Distribution' => 'Distribution',
					'Equity' => 'Equity',
					'Expense' => 'Expense',
					'Revenue' => 'Revenue',
	  		
				], null, ['placeholder' => 'Pick a description...', 'class' => 'form-control']) }}
		</div>

		<div class="col-md-4">
			{{ Form::label('type_description_sub', 'Type Description Sub Category') }}
	  		{{ Form::select('type_description_sub', 
				[
					'Automobile Expense' => 'Automobile Expense',
					'Automobile Lease' => 'Automobile Lease',
					'Bank Service Charges' => 'Bank Service Charges',
					'Computer Supplies' => 'Computer Supplies',
					'Distributions' => 'Distributions',
					'Donations' => 'Donations',
					'Dues and Subscriptions' => 'Dues and Subscriptions',
					'EMPLOYEE PAYROLL' => 'EMPLOYEE PAYROLL',
					'Freight Cost' => 'Freight Cost',
					'Gifts & Promotions' => 'Gifts & Promotions',
					'Insurance' => 'Insurance',
					'Insurance:Auto Insurance' => 'Insurance:Auto Insurance',
					'Insurance:Health Insurance' => 'Insurance:Health Insurance',
					'Insurance:Liability Insurance' => 'Insurance:Liability Insurance',
					'Insurance:Work Comp' => 'Insurance:Work Comp',
					'Office Supplies' => 'Office Supplies',
					'Payroll Service' => 'Payroll Service',
					'Postage and Delivery' => 'Postage and Delivery',
					'Professional Fees:Accounting' => 'Professional Fees:Accounting',
					'Rent' => 'Rent',
					'Telephone' => 'Telephone',
					'Travel & Ent' => 'Travel & Ent',
					'Travel & Ent:Entertainment' => 'Travel & Ent:Entertainment',
					'Travel & Ent:Meals' => 'Travel & Ent:Meals',
					'Travel & Ent:Travel' => 'Travel & Ent:Travel',
					'Utilities:Gas and Electric' => 'Utilities:Gas and Electric',
					'OLD LIST BELOW' => 'OLD LIST BELOW',
					'Automobile' => 'Automobile',
					'Telephone' => 'Telephone',
					'Office Supplies' => 'Office Supplies',
					'Computer Supplies' => 'Computer Supplies',
					'Insurance' => 'Insurance',
					'Cargo Insurance' => 'Cargo Insurance',
					'Automobile Insurance' => 'Automobile Insurance',
					'Workmans Comp Insurance' => 'Workmans Comp Insurance',
					'General Liability Insurance' => 'General Liability Insurance',
					'Health Insurance' => 'Health Insurance',
					'Subscriptions and Services' => 'Subscriptions and Services',
					'Rent' => 'Rent',
					'Travel' => 'Travel',
					'Entertainment' => 'Entertainment',
					'Utilities' => 'Utilities',
					'Checking' => 'Checking',
					'Meals' => 'Meals',
					'Postage' => 'Postage',
					'Employee Payroll' => 'Employee Payroll',
					'Gifts and Promotions' => 'Gifts and Promotions',
					'Donations' => 'Donations',
					'Void' => 'Void',
					'Personal' => 'Personal',
					'Refund' => 'Refund',
					'Freight Cost' => 'Freight Cost',
					'Freight Sales' => 'Freight Sales',
					'Income Collected' => 'Income Collected',
					'Bank Loan' => 'Bank Loan',
					'Cash Transfer' => 'Cash Transfer',
					'Money Market Savings' => 'Money Market Savings',
					'Capital Stock' => 'Capital Stock',
					'Retained Earnings' => 'Retained Earnings',
					'Net Income' => 'Net Income',
					'Employee Parking' => 'Employee Parking',
					'Bank Service Charges' => 'Bank Service Charges',
					'Income Tax Payment' => 'Income Tax Payment',
					'Payroll Service' => 'Payroll Service',
					'Professional Service' => 'Professional Service',
					'Interest Income' => 'Interest Income',
					'Payroll Taxes' => 'Payroll Taxes',
					'Salaries' => 'Salaries',
					'Printing and Reproduction' => 'Printing and Reproduction',
					'Profit Sharing 401k' => 'Profit Sharing 401k',
					'Bad Debts' => 'Bad Debts',
					'Receivable Damage' => 'Receivable Damage',
					'Commissions' => 'Commissions'



					
	  		
				], null, ['placeholder' => 'Pick a sub description...', 'class' => 'form-control']) }}
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-4">
			{{ Form::label('invoice_date_journal', 'Invoice Date') }}
			{{ Form::text('invoice_date_journal', null, ['class' => 'form-control']) }}

		</div>
		<div class="col-md-4">
			{{ Form::label('reference_number', 'Reference #') }}
			{{ Form::text('reference_number', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('memo', 'Memo') }}
			{{ Form::text('memo', null, ['class' => 'form-control']) }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			{{ Form::label('payment_method', 'Payment Method') }}
			{{ Form::select('payment_method', 
				[

					'CHECK' => 'CHECK',
					'ACH' => 'ACH',
					'CREDIT' => 'CREDIT',
					'CASH' => 'CASH'
	
					
	  		
				], null, ['placeholder' => 'Pick a payment method...', 'class' => 'form-control']) }}

		</div>
		
		<div class="col-md-4">
		{{ Form::label('payment_amount', 'Payment Amount') }}
			{{ Form::text('payment_amount', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
		{{ Form::label('payment_cents', 'Cents') }}
			{{ Form::text('payment_cents', null, ['class' => 'form-control']) }}
		</div>
		
	</div>

	
	
	@if(!isset($newForm))
	<h3>Date (this date is when you want the journal entry to show up on the checking account)</h3>
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('created_at', 'Date') }}
			{{ Form::text('created_at', null, ['class' => 'form-control']) }}
		</div>
	</div>
	@endif



	<h3>Deposit Amount</h3>
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('deposit_amount', 'Deposit Amount') }}
			{{ Form::text('deposit_amount', null, ['class' => 'form-control']) }}
		</div>
	</div>
	<h3>Keep Off Checking Account?</h3>
	<div class="row">
		<div class="col-md-3">
			YES{{ Form::radio('off_ledger', 'YES') }}
			NO{{ Form::radio('off_ledger', 'NO') }}
		</div>
	</div>

	


	<h3>Send A Check</h3>
	
	@if(isset($post->id) === true)
	<ul>
		<li>Check Cleared: {{ $post->cleared }}</li>
		<li>Check Cleared Date: {{ $post->cleared_date }}</li>
	</ul>
	@endif
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('address', 'Address') }}
			{{ Form::text('address', null, ['class' => 'form-control']) }}

		</div>
		<div class="col-md-3">
			{{ Form::label('city', 'City') }}
			{{ Form::text('city', null, ['class' => 'form-control']) }}

		</div>
		<div class="col-md-3">
			{{ Form::label('state', 'State') }}
			{{ Form::text('state', null, ['class' => 'form-control']) }}

		</div>
		<div class="col-md-3">
			{{ Form::label('zip', 'Zip') }}
			{{ Form::text('zip', null, ['class' => 'form-control']) }}

		</div>
		
	</div>

	<div class="row">
		<div class="col-md-4">
			{{ Form::label('name_on_check', 'Name on Check') }}
			{{ Form::text('name_on_check', null, ['class' => 'form-control']) }}

		</div>
		<div class="col-md-4">
			{{ Form::label('payment_number', 'Payment Number (Check # or Bank Ref #)') }}
			{{ Form::text('payment_number', null, ['class' => 'form-control']) }}

		</div>
		
		
		
	</div>

	<h2>ACH Payment Info (no canadian carriers)</h2>

	<div class="row">
	  	<div class="col-md-4">
	  		{{ Form::label('bank_name', 'Bank Name') }}
	  		{{ Form::text('bank_name', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('routing_number', 'Routing Number (Must be 9 digits)') }}
	  		{{ Form::text('routing_number', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('account_number', 'Account Number (No more than 12 digits)') }}
	  		{{ Form::text('account_number', null, ['class' => 'form-control']) }}
		</div>
	</div>

	<div class="row">
	  	<div class="col-md-4">
	  		{{ Form::label('account_type', 'Account Type') }}
	  		{{ Form::select('account_type', 
				[
	  		 		'Checking' => 'Checking',
			  		'Savings' => 'Savings',
				], null, ['placeholder' => 'Pick an account type...', 'class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('accounting_email', 'Accounting Email') }}
	  		{{ Form::text('accounting_email', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('accounting_phone', 'Accounting Phone') }}
	  		{{ Form::text('accounting_phone', null, ['class' => 'form-control']) }}
		</div>
	</div>

	<div class="row">
	  	
		<div class="col-md-4">
			{{ Form::label('account_name_routing', 'Account Name (NOT EXCEED 22 CHAR OR CONTAIN A COMMA)') }}
	  		{{ Form::text('account_name_routing', null, ['class' => 'form-control', 'maxlength' => '22', 'placeholder' => 'No Commas']) }}
		</div>
		
	</div>

	<div class="row">

		@if(isset($post->id) !== false && $post->journal_balanced === 'YES')
		<div class="col-md-4">
			{{ Form::submit($submitButtonText, ['class' => 'form-control btn btn-default', 'style' => 'margin-top: 15px; pointer-events: none; cursor: default;']) }}
		</div>
		@else
		<div class="col-md-4">
			{{ Form::submit($submitButtonText, ['class' => 'form-control btn btn-primary', 'style' => 'margin-top: 15px;']) }}
		</div>

		@endif
		
		@if(isset($post->id) !== false)
		<!-- <div class="col-md-4" style="margin-top: 30px;">
			<a class="btn btn-primary" href="{{ URL::to('/printCheckFromJournal/' . $post->id) }}"><b>Print Check</b></a>
		</div>
		<div class="col-md-4" style="margin-top: 30px;">
			<a class="btn btn-primary" href="{{ URL::to('/createACHFromJournal/' . $post->id) }}"><b>Create ACH File</b></a>
		</div> -->

		<div class="btn-group" role="group" aria-label="Basic example">
		  
		  @if(isset($post->id) !== false && $post->journal_balanced === 'YES')
		  <a style="pointer-events: none; cursor: default;" class="btn btn-default" href="{{ URL::to('/printCheckFromJournal/' . $post->id) }}"><b>Print Check (L)</b></a>
		  
		  <a style="pointer-events: none; cursor: default;" class="btn btn-default" href="{{ URL::to('/createACHFromJournal/' . $post->id) }}"><b>Create ACH File (L)</b></a>
		  @else
		  <a class="btn btn-primary" href="{{ URL::to('/printCheckFromJournal/' . $post->id) }}"><b>Print Check</b></a>
		  
		  <a class="btn btn-primary" href="{{ URL::to('/createACHFromJournal/' . $post->id) }}"><b>Create ACH File</b></a>

		   @endif


		  @endif
		<a class="btn btn-primary" href="newJournalEntry"><b>Create New Account</b></a>
		
		<a class="btn btn-primary" href="payMultipleSubCategories"><b>Pay Multiple Sub Categories</b></a>
		
		</div>
	</div>
	

