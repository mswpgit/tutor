<?php

namespace Mod\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Mod\Form\Menu as MenuForm;
use Zend\View\Model\ViewModel;

class MenuWidget extends AbstractHelper
{
	/**
	 * Login Form
	 * @var MenuForm
	 */
	protected $menuForm;

	/**
	 * $var string template used for view
	 */
	protected $viewTemplate;
	/**
	 * __invoke
	 *
	 * @access public
	 * @param array $options array of options
	 * @return string
	 */
	public function __invoke($options = array())
	{
		if (array_key_exists('render', $options))
		{
			$render = $options['render'];
		}
		else
		{
			$render = true;
		}
		if (array_key_exists('redirect', $options))
		{
			$redirect = $options['redirect'];
		}
		else
		{
			$redirect = false;
		}

		$vm = new ViewModel(array(
			'menuForm' => $this->getMenuForm(),
			'redirect'  => $redirect,
		));

		$vm->setTemplate($this->viewTemplate);

		if ($render)
		{
			return $this->getView()->render($vm);
		}
		else
		{
			return $vm;
		}
	}

	/**
	 * Retrieve Menu Form Object
	 * @return MenuForm
	 */
	public function getMenuForm()
	{
		return $this->menuForm;
	}

	/**
	 * Inject Menu Form Object
	 * @param MenuForm $menuForm
	 * @return MenuWidget
	 */
	public function setMenuForm(MenuForm $menuForm)
	{
		$this->menuForm = $menuForm;
		return $this;
	}

	/**
	 * @param string $viewTemplate
	 * @return MenuWidget
	 */
	public function setViewTemplate($viewTemplate)
	{
		$this->viewTemplate = $viewTemplate;
		return $this;
	}
}
