<?php

namespace MApp\Controller;

use Zend\View\Model\ViewModel;

class ExampleWidgetController extends AbstractWidget
{
	/**
	 * @return ViewModel
	 */
	public function indexAction()
	{
		return new ViewModel();
	}
}
