<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h3>Account Entry</h3>
		</div>
		<div class="col-md-6">
			<a href="newJournalEntry">Create New Account</a>
		</div>
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
					'BILLPMT' => 'BILLPMT',
					'GENJRN' => 'GENJRN'
					
	  		
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
					
					'Automobile' => 'Automobile',
					'Telephone' => 'Telephone',
					'Office Supplies' => 'Office Supplies',
					'Computer Supplies' => 'Computer Supplies',
					'Insurance' => 'Insurance',
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
					'Income Collected' => 'Income Collected',
					'Bank Loan' => 'Bank Loan',
					'Cash Transfer' => 'Cash Transfer',
					'Money Market Savings' => 'Money Market Savings'
					
	  		
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
	<h3>Deposit Amount</h3>
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('deposit_amount', 'Deposit Amount') }}
			{{ Form::text('deposit_amount', null, ['class' => 'form-control']) }}
		</div>
	</div>
	<h3>Off Ledger?</h3>
	<div class="row">
		<div class="col-md-3">
			YES{{ Form::radio('off_ledger', 'YES') }}
			NO{{ Form::radio('off_ledger', 'NO') }}
		</div>
	</div>

	


	<h3>Send A Check</h3>
	
	
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

	<div class="row">
		<div class="col-md-4">
			{{ Form::submit($submitButtonText, ['class' => 'form-control btn btn-primary', 'style' => 'margin-top: 15px;']) }}
		</div>
		
		@if(isset($post->id) !== false)
		<div class="col-md-4" style="margin-top: 30px;">
			<a href="{{ URL::to('/printCheckFromJournal/' . $post->id) }}"><b>Print Check</b></a>
		</div>
		@endif
	</div>
	

