<?php

namespace Content\Entity;

use Doctrine\Common\Collections\Collection;

class RecursiveMenuIterator implements \RecursiveIterator
{
	private $_data;

	public function __construct(Collection $data)
	{
		$this->_data = $data;
	}
	public function hasChildren()
	{
		return ( ! $this->_data->current()->getChildMenu()->isEmpty());
	}
	public function getChildren()
	{
		return new RecursiveMenuIterator($this->_data->current()->getChildMenu());
	}
	public function current()
	{
		return $this->_data->current();
	}
	public function next()
	{
		$this->_data->next();
	}
	public function key()
	{
		return $this->_data->key();
	}
	public function valid()
	{
		return $this->_data->current() instanceof \Content\Entity\Menu;
	}
	public function rewind()
	{
		$this->_data->first();
	}

}
