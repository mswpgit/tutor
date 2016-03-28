<?php

namespace Application\Entity;

class AbstractEntity
{
	/**
	 * Helper function.
	 */
	public function exchangeArray($data)
	{
		foreach ($data as $key => $val)
		{
			if (property_exists($this, $key))
			{
				$this->$key = ($val !== null) ? $val: null;
			}
		}
	}

	/**
	 * Helper function
	 */
	public function getArrayCopy()
	{
		return get_object_vars($this);
	}
}