{{ Form::label('name', 'Name') }}
{{ Form::select('name', $employees
, null, ['placeholder' => 'Choose employee...', 'class' => 'form-control']) }}


{{ Form::label('month', 'Month') }}
{{ Form::select('month', ['Jan' => 'Jan', 
						'Feb' => 'Feb', 
						'Mar' => 'Mar',
						'Apr' => 'Apr', 
						'May' => 'May',
						'Jun' => 'Jun', 
						'Jul' => 'Jul',
						'Aug' => 'Aug', 
						'Spt' => 'Spt',
						'Oct' => 'Oct', 
						'Nov' => 'Nov',
						'Dec' => 'Dec'], null, ['placeholder' => 'Choose month...', 'class' => 'form-control']) }}

{{ Form::label('year', 'Year') }}
{{ Form::select('year', ['2017' => '2017', '2018' => '2018', '2019' => '2019'], null, ['placeholder' => 'Choose year...', 'class' => 'form-control']) }}

{{ Form::label('months_profit', 'Months Profit') }}
{{ Form::text('months_profit', null, ['class' => 'form-control']) }}

{{ Form::label('employee_type', 'Employee Type') }}
{{ Form::select('employee_type', ['commission' => 'Commission', 'hourly' => 'Hourly', 'salary' => 'Salary'], null, ['placeholder' => 'Choose type...', 'class' => 'form-control']) }}



{{ Form::label('weekly_draw', 'Weekly Draw') }}
{{ Form::text('weekly_draw', null, ['class' => 'form-control']) }}

{{ Form::label('ncm', 'Number of Checks per Month') }}
{{ Form::select('ncm', ['3' => '3', '4' => '4', '5' => '5'], null, ['placeholder' => 'Choose number of checks in month...', 'class' => 'form-control']) }}

{{ Form::label('commission', 'Commission') }}
{{ Form::text('commission', null, ['class' => 'form-control']) }}

{{ Form::label('bonus', 'Bonus') }}
{{ Form::text('bonus', null, ['class' => 'form-control']) }}

{{ Form::label('additional', 'Additional') }}
{{ Form::text('additional', null, ['class' => 'form-control']) }}

{{ Form::label('employee_payout_notes', 'Notes') }}
{{ Form::text('employee_payout_notes', null, ['class' => 'form-control']) }}

{{ Form::submit($submitButtonText, ['class' => 'form-control btn btn-primary']) }}