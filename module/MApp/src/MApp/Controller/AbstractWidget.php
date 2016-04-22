<?php

namespace MApp\Controller;

use MApp\Entity\WidgetInterface;
use MBase\Exception\IoCException;
	//
use Zend\Mvc\Controller\AbstractActionController;

abstract class AbstractWidget extends AbstractActionController
{
	/**
	 * @var WidgetInterface
	 */
	protected $item;

	/**
	 * @param  WidgetInterface $item
	 * @return void
	 */
	public function setItem(WidgetInterface $item)
	{
		$this->item = $item;
	}

	/**
	 * @return WidgetInterface
	 */
	public function getItem()
	{
		if (! $this->item instanceof WidgetInterface)
		{
			throw new IoCException(
				'Item data was not set.'
			);
		}
		return $this->item;
	}

}
