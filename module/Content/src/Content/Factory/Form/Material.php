<?php

namespace Content\Factory\Form;

use Zend\Form\FormElementManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Content\Form;

class Material implements FactoryInterface
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
		$options = $sm->get('contentModuleOptions');
		$entityManager = $sm->get('Doctrine\ORM\EntityManager');
		$form = new Form\Material(null, $options, $entityManager);
		// Inject the FormElementManager to support custom FormElements
		$form->getFormFactory()->setFormElementManager($fem);
		$form->setInputFilter(new Form\MaterialFilter($options));
		return $form;
	}
}