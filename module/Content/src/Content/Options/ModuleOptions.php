<?php

namespace Content\Options;

use Base\Options\BaseModuleOptions;

class ModuleOptions extends BaseModuleOptions implements MenuOptionsInterface, MaterialOptionsInterface, CategoryOptionsInterface
{
	/**
	 * @var string
	 */
	protected $menuEntityClass = 'Content\Entity\Menu';

	/**
	 * @var string
	 */
	protected $categoryEntityClass = 'Content\Entity\Category';

	/**
	 * @var string
	 */
	protected $materialEntityClass = 'Content\Entity\Material';

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

	/**
	 * @param string $categoryEntityClass
	 * @return \Content\Options\ModuleOptions
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
	 * @param string $materialEntityClass
	 * @return \Content\Options\ModuleOptions
	 */
	public function setMaterialEntityClass($materialEntityClass)
	{
		$this->materialEntityClass = $materialEntityClass;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getMaterialEntityClass()
	{
		return $this->materialEntityClass;
	}
}
