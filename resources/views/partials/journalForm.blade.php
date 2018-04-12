<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h3>Journal Entry</h3>
		</div>
		<div class="col-md-6">
			<a href="newJournalEntry">Create New Vendor</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			{{ Form::label('vendorSearchJournal', 'Vendor Search') }}
	  		{{ Form::text('vendorSearchJournal', null, ['class' => 'form-control', 'placeholder' => 'Vendor Search']) }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('account_name', 'Company Name') }}
			{{ Form::text('account_name', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('account_id', 'Company ID') }}
			{{ Form::text('account_id', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
		{{ Form::label('payment_amount', 'Payment Amount') }}
			{{ Form::text('payment_amount', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('deposit_amount', 'Deposit Amount') }}
			{{ Form::text('deposit_amount', null, ['class' => 'form-control']) }}
		</div>
	</div>


	<div class="row">
		<div class="col-md-6">
			{{ Form::label('memo', 'Memo') }}
			{{ Form::text('memo', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-6">
			{{ Form::label('reference_number', 'Reference #') }}
			{{ Form::text('reference_number', null, ['class' => 'form-control']) }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			{{ Form::label('type_description', 'Type Description') }}
	  		{{ Form::select('type_description', 
				[

					'Bank' => 'Bank',
					'Accounts Receivable' => 'Accounts Receivable',
					'Other Current Asset' => 'Other Current Asset',
					'Fixed Asset' => 'Fixed Asset',
					'Other Asset' => 'Other Asset',
					'Accounts Payable' => 'Accounts Payable',
					'Other Current Liability' => 'Other Current Liability',
					'Equity' => 'Equity',
					'Income' => 'Income',
					'Cost Of Goods Sold' => 'Cost Of Goods Sold',
					'Expense' => 'Expense',
					'Other Income' => 'Other Income',
					'Other Expense' => 'Other Expense',
					'Non Positng' => 'Non Positng'
	  		
				], null, ['placeholder' => 'Pick a description type...', 'class' => 'form-control']) }}
		</div>

		<div class="col-md-6">
			{{ Form::label('type_description_sub', 'Type Description Sub Category') }}
	  		{{ Form::select('type_description_sub', 
				[

					'Automobile Expense' => 'Automobile Expense',
					'Automobile Lease' => 'Automobile Lease',
					'Bank Service Charges' => 'Bank Service Charges',
					'Computer Supplies' => 'Computer Supplies',
					'Dues and Subscriptions' => 'Dues and Subscriptions',
					'Auto Insurance' => 'Auto Insurance',
					'Health Insurance' => 'Health Insurance',
					'Insurance Other' => 'Insurance Other',
					'Office Supplies' => 'Office Supplies',
					'Payroll Service' => 'Payroll Service',
					'Postage and Delivery' => 'Postage and Delivery',
					'Printing and Reproduction' => 'Printing and Reproduction',
					'Rent' => 'Rent',
					'Telephone' => 'Telephone',
					'Meals' => 'Meals',
					'Travel and Ent' => 'Travel and Ent',
					'Gas and Electric' => 'Gas and Electric',
					'Utilities Other' => 'Utilities - Other',
					
	  		
				], null, ['placeholder' => 'Pick a sub description type...', 'class' => 'form-control']) }}
		</div>
		
	</div>
	

{{ Form::submit($submitButtonText, ['class' => 'form-control btn btn-primary', 'style' => 'margin-top: 15px;']) }}