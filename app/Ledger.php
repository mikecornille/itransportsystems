<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Ledger extends Model
{
    public function clearedChecks($start_raw, $end_raw)
    {

        


    	$cleared_checks = Ledger::select('date', 'upload_date', 'reference_number', 'cleared', 'cleared_date', 'type', 'type_description', 'journal_entry_number', 'pro_number', 'account_name', 'payment_method', 'payment_amount', 'deposit_amount')->whereBetween('cleared_date', [$start_raw, $end_raw])->orderBy('cleared_date', 'asc')->get();
		
        return $cleared_checks;
  //       ->whereRaw("STR_TO_DATE(`cleared_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_raw}', '%m/%d/%Y')")
		// ->whereRaw("STR_TO_DATE(`cleared_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_raw}', '%m/%d/%Y')")
		




        

		
    }


    public function consolidateReferenceNumbersForRevenueAndEmail($start, $end)
    {

    	
		$unique_ref_numbers = Ledger::select('reference_number')
            ->groupBy('reference_number')
            ->whereBetween('date', [$start, $end])
            ->where('type_description', 'Revenue')
            ->get();


        $loop_count = count($unique_ref_numbers);

		$unique_ref_numbers_result = [];

         for ($x = 0; $x <= ($loop_count - 1); $x++) 
         {

         	if(isset($unique_ref_numbers[$x]->reference_number))
         		{
         			$queryResult = Ledger::where('reference_number', $unique_ref_numbers[$x]->reference_number)
         			->where('type_description', 'Revenue')
         			->sum('deposit_amount');

         			$queryResultInfo = Ledger::where('reference_number', $unique_ref_numbers[$x]->reference_number)
         			->where('type_description', 'Revenue')
         			->first();

         			
         			$onlyDate = date("m-d-Y", strtotime($queryResultInfo->date));

					$unique_ref_numbers_result[] = $unique_ref_numbers[$x]->reference_number . ' $' . 
					$queryResult . ' ' . $queryResultInfo->account_name . ' ID # ' . $queryResultInfo->account_id . ' DEPOSIT DATE: ' . $onlyDate . ' TYPE: ' . $queryResultInfo->payment_method;
         		}
         	else
         	{
         		continue;
         	}
    
         	

		}


			 


		$info = ['info' => $unique_ref_numbers_result];



			Mail::send(['html'=>'email.implodedRefNumbers'], $info, function($message) use ($info){
			$message->to('mikec@itransys.com')->subject("Revenue - Consolidated By Reference Numbers")
			->from('mikec@itransys.com', 'Mike')
			->replyTo('mikec@itransys.com', 'Mike')
			->sender('mikec@itransys.com', 'Mike');

        	});

    }

    public function achTotalsByDate($start, $end)
    {

		$achSums = [];
		$endDay = date("d", strtotime($end)); //for counting
		
		for ($x = 1; $x <= $endDay; $x++) 
        {
        	$month = date("m", strtotime($start));
        	$year = date("Y", strtotime($start));

        	$queryDate = $year . '-' . $month . '-' . $x;

        	$achSumResult = Ledger::whereDate('date', $queryDate)->where('payment_method', 'ACH')->sum('payment_amount');

        	$achSums[] = $queryDate . ' : $' . $achSumResult;
		}


		$achTotals = ['achTotals' => $achSums];



			Mail::send(['html'=>'email.implodedACHDates'], $achTotals, function($message) use ($achTotals){
			$message->to('mikec@itransys.com')->subject("Expense - ACH Payments Organized By Date")
			->from('mikec@itransys.com', 'Mike')
			->replyTo('mikec@itransys.com', 'Mike')
			->sender('mikec@itransys.com', 'Mike');

        	});

    }

    public function revenueQueryACH($start, $end)
    {
    	$revenueACH = Ledger::select('date', 'upload_date', 'reference_number', 'cleared', 'cleared_date', 'type', 'type_description', 'journal_entry_number', 'pro_number', 'account_name', 'memo', 'payment_method', 'payment_amount', 'deposit_amount')->whereBetween('date', [$start, $end])->where('type_description', 'Revenue')->where('payment_method', 'ACH')->orderBy('date', 'asc')->get();

    	return $revenueACH;
    }

    public function revenueQueryCHECK($start, $end)
    {
        $revenueCHECK = Ledger::select('date', 'upload_date', 'reference_number', 'cleared', 'cleared_date', 'type', 'type_description', 'journal_entry_number', 'pro_number', 'account_name', 'memo', 'payment_method', 'payment_amount', 'deposit_amount')->whereBetween('date', [$start, $end])->where('type_description', 'Revenue')->where('payment_method', 'CHECK')->orderBy('date', 'asc')->orderBy('reference_number', 'asc')->get();

        return $revenueCHECK;
    }

    

    public function totalRevenueByDate($start, $end)
    {

		$revenueSums = [];
		
		$endDay = date("d", strtotime($end)); //for counting

		// This gets revenue with a payment method of check
		for ($x = 1; $x <= $endDay; $x++) 
        {
        	$month = date("m", strtotime($start));
        	$year = date("Y", strtotime($start));

        	$queryDate = $year . '-' . $month . '-' . $x;

        	$revenueSumResult = Ledger::whereDate('date', $queryDate)->where('type_description', 'Revenue')->where('payment_method', 'CHECK')->sum('deposit_amount');

        	$revenueSums[] = $queryDate . ' : $' . $revenueSumResult;
		}


		// This gets revenue with a payment method of ACH
		$revenueSumsACH = [];
		
		for ($x = 1; $x <= $endDay; $x++) 
        {
        	$month = date("m", strtotime($start));
        	$year = date("Y", strtotime($start));

        	$queryDate = $year . '-' . $month . '-' . $x;

        	$revenueSumsACHResult = Ledger::whereDate('date', $queryDate)->where('type_description', 'Revenue')->where('payment_method', 'ACH')->sum('deposit_amount');

        	$revenueSumsACH[] = $queryDate . ' : $' . $revenueSumsACHResult;
		}





		



		$revenueTotals = ['revenueTotals' => $revenueSums, 'revenueSumsACH' => $revenueSumsACH];



			Mail::send(['html'=>'email.implodedRevenueDates'], $revenueTotals, function($message) use ($revenueTotals){
			$message->to('mikec@itransys.com')->subject("Revenue - ACH And Checks Organized By Deposit Date")
			->from('mikec@itransys.com', 'Mike')
			->replyTo('mikec@itransys.com', 'Mike')
			->sender('mikec@itransys.com', 'Mike');

        	});





    }

    public function expenseACHQuery($start, $end)
    {
    	$expenseACH = Ledger::select('date', 'upload_date', 'reference_number', 'cleared', 'cleared_date', 'type', 'type_description', 'journal_entry_number', 'pro_number', 'account_name', 'memo', 'payment_method', 'payment_amount', 'deposit_amount')->whereBetween('date', [$start, $end])->where('type_description', 'Expense')->where('payment_method', 'ACH')->orderBy('date', 'asc')->get();

    	return $expenseACH;
    }

    public function checkingAccountBalance($start, $end)
    {

        $payment_amount_totals = Ledger::whereBetween('date', [$start, $end])->sum('payment_amount');
        $deposit_amount_totals = Ledger::whereBetween('date', [$start, $end])->sum('deposit_amount');
        $mbFinancialBalance = $deposit_amount_totals - $payment_amount_totals;

        return $mbFinancialBalance; 

    }

    public function bankCodes()
    {
        $info = ['foo' => 'foo', 'bar' => 'bar'];



            Mail::send(['html'=>'email.bankCodes'], $info, function($message) use ($info){
            $message->to('mikec@itransys.com')->subject("Bank Codes")
            ->from('mikec@itransys.com', 'Mike')
            ->replyTo('mikec@itransys.com', 'Mike')
            ->sender('mikec@itransys.com', 'Mike');

            });
    }

    




}
