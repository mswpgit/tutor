<?php

namespace Mod\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class FlashMessengerHelper extends AbstractHelper
{

	protected $serviceLocator;

	/**
	 * $var string template used for view
	 */
	protected $viewTemplate = 'mod/index/messanger.phtml';
	/**
	 * __invoke
	 *
	 * @access public
	 * @param array $options array of options
	 * @return string
	 */
	public function __invoke($options = array())
	{
		/** @var $flashmessenger \Zend\Mvc\Controller\Plugin\FlashMessenger */
//		$flashmessenger = $this->getServiceLocator()->get('ControllerPluginManager')->get('flashmessenger');

//		$flashmessenger->set

//		echo $flashmessenger->render(\Zend\Mvc\Controller\Plugin\FlashMessenger::NAMESPACE_INFO);
//		echo $this->flashMessenger()->render(FlashMessenger::NAMESPACE_SUCCESS);
//		\Zend\Debug\Debug::dump($this->flashMessenger()->getNamespace());
//		\Zend\Debug\Debug::dump($this->flashMessenger()->getMessages());
//		\Zend\Debug\Debug::dump($this->flashMessenger()->getInfoMessages());
//		\Zend\Debug\Debug::dump($flashmessenger->getInfoMessages());

//		FlashMessengerHelper
//		echo 'FlashMessengerHelper';


		$vm = new ViewModel();

		$vm->setTemplate($this->viewTemplate);

		return $this->getView()->render($vm);
	}

	/**
	 * @param string $viewTemplate
	 * @return LoginWidget
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
