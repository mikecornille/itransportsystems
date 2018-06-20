<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h3>Credit Card Entry</h3>
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-4">
			{{ Form::label('vendorSearchJournal', 'Account Search') }}
	  		{{ Form::text('vendorSearchJournal', null, ['class' => 'form-control', 'placeholder' => 'Account Search']) }}
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			{{ Form::label('account_name', 'Account Name') }}
			{{ Form::text('account_name', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('account_id', 'Account ID') }}
			{{ Form::text('account_id', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('invoice_date_journal', 'Invoice Date') }}
			{{ Form::text('invoice_date_journal', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			
			{{ Form::label('payment_method', 'Payment Method') }}
			{{ Form::select('payment_method', 
				[

					'CHECK' => 'CHECK',
					'ACH' => 'ACH',
					'CREDIT' => 'CREDIT',
					'CASH' => 'CASH'
	
					
	  		
				], null, ['placeholder' => 'Pick a payment method...', 'class' => 'form-control']) }}

		
		</div>
	</div>

	

@for ($i = 0; $i < 15; $i++)
    <input type="hidden" name="counter[]" value="{{ $i }}">
    <div class="row">
    	<div class="col-md-4">
			{{ Form::label('type_description_sub', 'Sub') }}
	  		{{ Form::select('type_description_sub[]', 
				[
					
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
					'Income Tax Payment' => 'Income Tax Payment'

					
	  		
				], null, ['placeholder' => 'Pick a sub description...', 'class' => 'form-control']) }}
		</div>
    	<div class="col-md-4">
			<label>Payment Amount</label>
			<td><input type="text" class="form-control" id="payment_amount" name="payment_amount[{{ $i }}]"></td>
		</div>
    <div class="col-md-4">
		<label>Cents</label>
			<td><input type="text" class="form-control" id="payment_cents" name="payment_cents[{{ $i }}]"></td>
		</div>
	</div>
@endfor









	

	<div class="row">
		<div class="col-md-4">
			{{ Form::submit($submitButtonText, ['class' => 'form-control btn btn-primary', 'style' => 'margin-top: 15px;']) }}
		</div>
		
	
	</div>
	







