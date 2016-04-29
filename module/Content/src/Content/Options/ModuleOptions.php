<?php

namespace Content\Options;

use Base\Options\BaseModuleOptions;

class ModuleOptions extends BaseModuleOptions implements MenuOptionsInterface
{
	/**
	 * @var string
	 */
	protected $menuEntityClass = 'Content\Entity\Menu';

	/**
	 * @param string $menuEntityClass
	 * @return \Content\Options\ModuleOptions
	 */
	public function setMenuEntityClass($menuEntityClass)
	{
		$this->menuEntityClass = $menuEntityClass;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getMenuEntityClass()
	{
		return $this->menuEntityClass;
	}

}
