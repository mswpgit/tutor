<?php

namespace Mod\Factory\Form;

use Zend\Form\FormElementManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Mod\Form;

class Menu implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $formElementManager)
	{
		if ($formElementManager instanceof FormElementManager)
		{
			$sm = $formElementManager->getServiceLocator();
			$fem = $formElementManager;
		}
		else
		{
			$sm = $formElementManager;
			$fem = $sm->get('FormElementManager');
		}

		/**
		 * @var FormElementManager $formElementManager
		 */
		$options = $sm->get('module_options');
		$form = new Form\Menu(null, $options);
		// Inject the FormElementManager to support custom FormElements
		$form->getFormFactory()->setFormElementManager($fem);

		$form->setInputFilter(new Form\MenuFilter($options));
//\Zend\Debug\Debug::dump($form);die;
		return $form;
	}
}
