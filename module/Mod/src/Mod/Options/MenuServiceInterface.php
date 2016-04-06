<?php
namespace Mod\Options;

interface MenuServiceInterface
{
	/**
	 * @param string $menuEntityClass
	 * @return \Mod\Options\ModuleOptions
	 */
	public function setMenuEntityClass($menuEntityClass);

	/**
	 * @return string
	 */
	public function getMenuEntityClass();

}
