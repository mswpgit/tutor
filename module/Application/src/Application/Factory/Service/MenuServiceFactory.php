<?php

namespace Application\Factory\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Service\MenuService;

class MenuServiceFactory implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		// Dependencies are fetched from Service Manager
		$entityManager = $serviceLocator->get('doctrine.entitymanager.orm_default');

		return new MenuService($entityManager);
	}
}