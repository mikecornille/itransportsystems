<?php

namespace App\Transformers;

class TruckstopTransformer extends Transformer {
	

	public function transform($record)
	{

		

		return [
		'pick_city'  => $record->pick_city,
		'pick_state' => $record->pick_state,
		'delivery_city' => $record->delivery_city,
		'delivery_state' => $record->delivery_state,
		'trailer_type' => $record->trailer_type,
		'pick_date' => $record->pick_date,
		'load_type' => $record->load_type,
		'length' => $record->length,
		'weight' => $record->weight,
		'offering' => $record->post_money,
		'special_instructions' => $record->special_instructions,
		'contact_name' => $record->company_contact,
		'contact_phone' => $record->contact_phone,
		
		];
	}
}