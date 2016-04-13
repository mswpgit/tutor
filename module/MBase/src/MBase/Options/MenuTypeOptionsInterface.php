<?php
namespace MBase\Options;

interface MenuTypeOptionsInterface
{
	/**
	 * @param string $menuTypeEntityClass
	 * @return \MBase\Options\ModuleOptions
	 */
	public function setMenuTypeEntityClass($menuTypeEntityClass);

	/**
	 * @return string
	 */
	public function getMenuTypeEntityClass();

}
