<?php

namespace Content\Options;

interface MenuOptionsInterface
{
	/**
	 * @param string $menuEntityClass
	 * @return \Content\Options\ModuleOptions
	 */
	public function setMenuEntityClass($menuEntityClass);

	/**
	 * @return string
	 */
	public function getMenuEntityClass();

}
