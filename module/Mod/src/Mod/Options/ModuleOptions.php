<?php

namespace Mod\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions implements MenuServiceInterface, AuthenticationOptionsInterface
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
	 * @var string
	 */
	protected $menuEntityClass = 'Mod\Entity\Menu';

	/**
	 * @var string
	 */
	protected $userEntityClass = 'Auth\Entity\User';

	/**
	 * @var string
	 */
	protected $loginWidgetViewTemplate = 'mod/index/login.phtml';

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
	 * @param string $userEntityClass
	 * @return \Mod\Options\ModuleOptions
	 */
	public function setUserEntityClass($userEntityClass)
	{
		$this->userEntityClass = $userEntityClass;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUserEntityClass()
	{
		return $this->userEntityClass;
	}

	/**
	 * @param string $loginWidgetViewTemplate
	 * @return string
	 */
	public function setLoginWidgetViewTemplate($loginWidgetViewTemplate)
	{
		$this->loginWidgetViewTemplate = $loginWidgetViewTemplate;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLoginWidgetViewTemplate()
	{
		return $this->loginWidgetViewTemplate;
	}
}
