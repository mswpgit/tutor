<?php

namespace MBase\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions implements
	MenuOptionsInterface, CategoryOptionsInterface,
	ContentOptionsInterface, MenuTypeOptionsInterface
{
	/**
	 * @var string
	 */
	protected $menuWidgetViewTemplate = 'm-base/templates/menu.phtml';

	/**
	 * @var string
	 */
	protected $menuEntityClass = 'MBase\Entity\Menu';

	/**
	 * @var string
	 */
	protected $categoryEntityClass = 'MBase\Entity\Category';

	/**
	 * @var string
	 */
	protected $contentEntityClass = 'MBase\Entity\Content';

	/**
	 * @var string
	 */
	protected $menuTypeEntityClass = 'MBase\Entity\MenuType';

	/**
	 * @param string $menuWidgetViewTemplate
	 * @return string
	 */
	public function setMenuWidgetViewTemplate($menuWidgetViewTemplate)
	{
		$this->menuWidgetViewTemplate = $menuWidgetViewTemplate;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getMenuWidgetViewTemplate()
	{
		return $this->menuWidgetViewTemplate;
	}

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

	/**
	 * @param string $categoryEntityClass
	 * @return \MBase\Options\ModuleOptions
	 */
	public function setCategoryEntityClass($categoryEntityClass)
	{
		$this->categoryEntityClass = $categoryEntityClass;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getCategoryEntityClass()
	{
		return $this->categoryEntityClass;
	}

	/**
	 * @param string $contentEntityClass
	 * @return \MBase\Options\ModuleOptions
	 */
	public function setContentEntityClass($contentEntityClass)
	{
		$this->contentEntityClass = $contentEntityClass;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getContentEntityClass()
	{
		return $this->contentEntityClass;
	}

	/**
	 * @param string $menuTypeEntityClass
	 * @return \MBase\Options\ModuleOptions
	 */
	public function setMenuTypeEntityClass($menuTypeEntityClass)
	{
		$this->menuTypeEntityClass = $menuTypeEntityClass;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getMenuTypeEntityClass()
	{
		return $this->menuTypeEntityClass;
	}
}
