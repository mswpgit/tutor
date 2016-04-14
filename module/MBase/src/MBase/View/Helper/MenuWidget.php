<?php

namespace MBase\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class MenuWidget extends AbstractHelper
{

	/**
	 * $var string template used for view
	 */
	protected $viewTemplate;

	protected $serviceLocator;

	/**
	 * __invoke
	 *
	 * @access public
	 * @param array $options array of options
	 * @return string
	 */
	public function __invoke($options = array())
	{
		/** @var $menuService \MBase\Service\MenuService */
		$menuService = $this->getServiceLocator()->get('menuService');

		$menuIterator = $menuService->getMenuType('menu_2');//   RecursiveIterator();

		$vm = new ViewModel(array(
			'menuIterator' => $menuIterator
		));

		$vm->setTemplate($this->viewTemplate);

		return $this->getView()->render($vm);
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

	public function setServiceLocator($serviceLocator)
	{
		$this->serviceLocator = $serviceLocator;
	}

	public function getServiceLocator()
	{
		return $this->serviceLocator;
	}
}
