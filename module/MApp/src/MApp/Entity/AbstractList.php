<?php

namespace MApp\Entity;

abstract class AbstractList implements \Iterator, \Countable
{
	/**
	 * @var array
	 */
	protected $items = array();

	/**
	 * @return boolean
	 */
	public function isEmpty()
	{
		return empty($this->items);
	}

	/**
	 * @return array
	 */
	public function rewind()
	{
		return reset($this->items);
	}

	/**
	 * @return mixed
	 */
	public function current()
	{
		return current($this->items);
	}

	/**
	 * @return mixed
	 */
	public function key()
	{
		return key($this->items);
	}

	/**
	 * @return mixed
	 */
	public function next()
	{
		return next($this->items);
	}

	/**
	 * @return boolean
	 */
	public function valid()
	{
		return ! is_null(key($this->items));
	}

	/**
	 * @return integer
	 */
	public function count()
	{
		return count($this->items);
	}
}
