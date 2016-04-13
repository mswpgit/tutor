<?php
namespace MBase\Options;

interface MenuOptionsInterface
{
	/**
	 * @param string $menuEntityClass
	 * @return \MBase\Options\ModuleOptions
	 */
	public function setMenuEntityClass($menuEntityClass);

	/**
	 * @return string
	 */
	public function getMenuEntityClass();

	/**
	 * @param string $menuWidgetViewTemplate
	 * @return string
	 */
	public function setMenuWidgetViewTemplate($menuWidgetViewTemplate);

	/**
	 * @return string
	 */
	public function getMenuWidgetViewTemplate();


}
