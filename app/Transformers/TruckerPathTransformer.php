<?php

namespace App\Transformers;

use Carbon\Carbon;

class TruckerPathTransformer extends Transformer {
	

	public function transform($record)
	{

		$time = strtotime($record->pick_date);

		$time = $time + 32400;

		$time = gmdate("Y-m-d\TH:i:s", $time);

		$trailer = $record->trailer_type;

		switch ($trailer) {
			case 'FV':
				$trailer = 'Flatbed, Van';
				break;
			case 'FSD':
				$trailer = 'Flatbed, Stepdeck';
				break;
			case 'AUTO':
				$trailer = 'Auto Carrier';
				break;
			case 'FSDV':
				$trailer = 'Van, Flatbed, Stepdeck';
				break;
			case 'HS':
				$trailer = 'Stepdeck';
				break;
			case 'RGN':
				$trailer = 'Lowboy';
				break;
			case 'RGNE':
				$trailer = 'Lowboy';
				break;
			case 'SDL':
				$trailer = 'Stepdeck';
				break;
			case 'SDRG':
				$trailer = 'Stepdeck, Lowboy';
				break;
			case 'CONG':
				$trailer = 'Conestoga';
				break;
			case 'FEXT':
				$trailer = 'Flatbed';
				break;
			case 'SD':
				$trailer = 'Stepdeck';
				break;
			case 'F':
				$trailer = 'Flatbed';
				break;
			case 'V':
				$trailer = 'Van';
				break;
			case 'PO':
				$trailer = 'Power Only';
				break;
			case 'DD':
				$trailer = 'Double Drop';
				break;
			case 'LAF':
				$trailer = 'Lowboy';
				break;
			case 'FWS':
				$trailer = 'Flatbed';
				break;				
			default:
				$trailer = 'Stepdeck';
				break;
		}

		

		$load_type = $record->load_type;
			if ($load_type == "FULL")
				{
					$load_type = "Full";
				}
			elseif($load_type == "PARTIAL")
				{
					$load_type = "Partial";
				}

		return [
		'description'  => "Construction Equipment or Machinery.  Dimensions " . $record->length . ' x ' . $record->width . ' x ' . $record->height,
		'comments' => $record->special_instructions,
		'load_size' => $load_type,
		'weight' => $record->weight,
		'equipment' => $trailer,
		'contact_first_name' => "Luke Thompson or Dispatch",
		'company' => "International Transport Systems",
		'email' => "luke@itransys.com",
		'phone' => $record->contact_phone,
		'from_city' => $record->pick_city,
		'from_state' => $record->pick_state,
		'from_date_local' => $time,
		'to_city' => $record->delivery_city,
		'to_state' => $record->delivery_state,
		
		];
	}
}