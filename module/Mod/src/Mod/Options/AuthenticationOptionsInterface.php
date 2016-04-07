<?php
namespace Mod\Options;

interface AuthenticationOptionsInterface
{
	/**
	 * @param string $userEntityClass
	 * @return \Mod\Options\ModuleOptions
	 */
	public function setUserEntityClass($userEntityClass);

	/**
	 * @return string
	 */
	public function getUserEntityClass();

	/**
	 * @param string $loginWidgetViewTemplate
	 * @return string
	 */
	public function setLoginWidgetViewTemplate($loginWidgetViewTemplate);

	/**
	 * @return string
	 */
	public function getLoginWidgetViewTemplate();


}
