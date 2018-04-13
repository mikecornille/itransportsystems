<?php

namespace App\Http\Middleware;

use Closure;

class AddMultiplePay
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
       $totals = "";
       $total_check = $request->totalCheckAmountFromCustomer;
       

            foreach($request->id as $id)
            {

                    if($request->has('customerPayStatus') && !empty($request->customerPayStatus[$id]))
                    {

                
                        $amount = $request->paid_amount_from_customer[$id];

                        $totals = (integer)$totals + (integer)$amount;

                    
                    }
            }

            
            if($totals == $total_check)
            {
                //Everything balances out move on to save
                return $next($request);
            }
            elseif($totals != $total_check)
            {

                $offAmount = (integer)$total_check - (integer)$totals;
                
                return redirect()->back()->withErrors([$offAmount]);

            }

            

        
            
        

            
    }
}
