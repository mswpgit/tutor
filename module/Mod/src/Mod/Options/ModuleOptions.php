<?php

namespace Mod\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions implements MenuServiceInterface
{
	/**
	 * @var string
	 */
	protected $menuWidgetViewTemplate = 'mod/index/menu.phtml';

	/**
	 * @param string $menuWidgetViewTemplate
	 * @return string
	 */
	public function setMenuWidgetViewTemplate($menuWidgetViewTemplate)
	{
		$this->menuWidgetViewTemplate = $menuWidgetViewTemplate;
	}

	/**
	 * @return string
	 */
	public function getMenuWidgetViewTemplate()
	{
		return $this->menuWidgetViewTemplate;
	}

	/**
	 * @var string
	 */
	protected $menuEntityClass = 'Mod\Entity\Menu';

	/**
	 * @param string $menuEntityClass
	 * @return \Mod\Options\ModuleOptions
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
