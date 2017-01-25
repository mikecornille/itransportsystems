<?php

namespace App\Transformers;

class DatTransformer extends Transformer {
	

	public function transform($record)
	{
		return [
		'pick_date'  => $record->pick_date,
		'truck_type' => $record->trailer_type,
		'origin_city' => $record->pick_city,
		'origin_state' => $record->pick_state,
		'dest_city' => $record->delivery_city,
		'dest_state' => $record->delivery_state,
		'full_partial' => $record->load_type,
		'length' => $record->length,
		'pounds' => $record->weight,
		'offering' => $record->offer_money,
		'contact' => $record->company_contact,
		'comment' => $record->special_instructions,
		
		];
	}
}