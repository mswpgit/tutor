<?php

namespace MApp\Entity;

use MApp\Entity\AbstractList;
use MApp\Entity\WidgetsList;
use MApp\Entity\WidgetInterface;
use MApp\Options\ThemeOptions;
use \InvalidArgumentException;

class Regions extends AbstractList
{
	/**
	 * @var WidgetsList
	 */
	protected $widgetsListPrototype;

	/**
	 * @var array
	 */
	protected $regionOptions = array();

	/**
	 * @param \MApp\Options\ThemeOptions $options
	 */
	public function __construct(ThemeOptions $options)
	{
		$theme = $options->getCurrentTheme();
		if (! isset($theme['common']['regions']))
		{
			throw new InvalidArgumentException(
				'Invalid format of the theme.'
			);
		}
		$regions = $theme['common']['regions'];
		foreach ($regions as $name => $region)
		{
			if (strtolower($name) == 'none')
			{
				continue;
			}

			$this->regionOptions[$name] = $region;
			$widgetsList = clone($this->getWidgetsListPrototype());
			$this->items[$name] = $widgetsList;
		}
	}

	/**
	 * @param  \MApp\Entity\WidgetInterface $item
	 * @return void
	 */
	public function addItem(WidgetInterface $item)
	{
		$items = &$this->items[$item->getRegion()];
		$items->addItem($item);
	}

	/**
	 * @param  string $regionName
	 * @param  string $optionName
	 * @throws \InvalidArgumentException
	 * @return mixed
	 */
	public function getRegionOption($regionName, $optionName)
	{
		if (! isset($this->regionOptions[$regionName]))
		{
			throw new \InvalidArgumentException(sprintf(
				"The region '%s' does not exists.",
				$regionName
			));
		}

		if (! isset($this->regionOptions[$regionName][$optionName]))
		{
			throw new \InvalidArgumentException(sprintf(
				"The option '%s' of region '%s' does not exists.",
				$regionName,
				$optionName
			));
		}

		return $this->regionOptions[$regionName][$optionName];
	}

	/**
	 * @param  mixed $index
	 * @return boolean
	 */
	public function offsetExists($index)
	{
		if (isset($this->items[$index]))
		{
			return true;
		}

		return false;
	}

	/**
	 * @return WidgetsList
	 */
	protected function getWidgetsListPrototype()
	{
		if (! $this->widgetsListPrototype instanceof WidgetsList)
		{
			$this->widgetsListPrototype = new WidgetsList();
		}

		return $this->widgetsListPrototype;
	}
}
