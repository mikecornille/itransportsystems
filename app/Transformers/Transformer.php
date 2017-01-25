<?php
namespace App\Transformers;

abstract class Transformer {
	public function transformCollection($collection)
	{
		return $collection->transform(function($record) {
			return $this->transform($record);
		});
	}
}