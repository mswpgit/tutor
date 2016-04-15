<?php

namespace MBase\Factory\Form;

use Zend\Form\FormElementManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use MBase\Form;

class Content implements FactoryInterface
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
		$options = $sm->get('baseModuleOptions');
		$entityManager    = $sm->get('Doctrine\ORM\EntityManager');
		$form = new Form\Content(null, $options, $entityManager);
		// Inject the FormElementManager to support custom FormElements
		$form->getFormFactory()->setFormElementManager($fem);
		$form->setInputFilter(new Form\ContentFilter($options));

		return $form;
	}
}
