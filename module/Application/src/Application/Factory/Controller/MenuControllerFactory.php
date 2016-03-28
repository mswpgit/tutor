<?php

namespace Application\Factory\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class MenuControllerFactory implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$countryApi = new CountryApi();
		$countryService = $serviceLocator->get('MsTravel\Service\CountryService');
		$countryApi->setCountryService($countryService);

		return $countryApi;
	}
}