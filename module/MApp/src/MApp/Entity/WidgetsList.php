<?php

namespace MApp\Entity;

class WidgetsList extends AbstractList
{
	/**
	 * @param  WidgetInterface $item
	 * @return void
	 */
	public function addItem(WidgetInterface $item)
	{
		$this->items[] = $item;
	}
}
