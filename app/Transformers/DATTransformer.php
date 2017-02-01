<?php

namespace App\Transformers;

class DatTransformer extends Transformer {
	

	public function transform($record)
	{

		//pick date 1/25/17 We will try not to tamper with DAT date

		
		$weight = substr($record->weight, 0, -3);

		$trailer = $record->trailer_type;

		switch ($trailer) {
			case 'FV':
				$trailer = 'VF';
				break;
			case 'FSD':
				$trailer = 'FD';
				break;
			case 'FSDV':
				$trailer = 'VF';
				break;
			case 'HS':
				$trailer = 'FH';
				break;
			case 'RGN':
				$trailer = 'RG';
				break;
			case 'RGNE':
				$trailer = 'RG';
				break;
			case 'SDL':
				$trailer = 'SD';
				break;
			case 'SDRG':
				$trailer = 'SR';
				break;
			case 'CONG':
				$trailer = 'CN';
				break;
			case 'FEXT':
				$trailer = 'ST';
				break;
			case 'SD':
				$trailer = 'SD';
				break;
			case 'F':
				$trailer = 'F';
				break;
			case 'V':
				$trailer = 'V';
				break;
			case 'PO':
				$trailer = 'PO';
				break;
			case 'DD':
				$trailer = 'DD';
				break;
			case 'LAF':
				$trailer = 'LA';
				break;
			case 'FWS':
				$trailer = 'FS';
				break;				
			default:
				$trailer = 'SD';
				break;
		}

		$offer = $record->post_money;
			if ($offer == "0")
				{
					$offer = "";
				}
			else 
				{
					$offer = $record->post_money;
				}

		return [
		'pick_date'  => $record->pick_date,
		'truck_type' => $trailer,
		'origin_city' => $record->pick_city,
		'origin_state' => $record->pick_state,
		'dest_city' => $record->delivery_city,
		'dest_state' => $record->delivery_state,
		'full_partial' => $record->load_type,
		'length' => $record->length,
		'pounds' => $weight,
		'offering' => $offer,
		'contact' => $record->contact_phone,
		'comment' => $record->special_instructions,
		
		];
	}
}