<?php
namespace MBase\Service;

use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use MBase\EventManager\EventProvider;

abstract class AbstractService extends EventProvider implements ServiceManagerAwareInterface
{
	/**
	 * @var ServiceManager
	 */
	protected $serviceManager;

	/**
	 * @see \Zend\ServiceManager\ServiceManagerAwareInterface::setServiceManager()
	 */
	public function setServiceManager(ServiceManager $serviceManager)
	{
		$this->serviceManager = $serviceManager;
	}

	/**
	 * @return ServiceManager
	 */
	public function getServiceManager()
	{
		return $this->serviceManager;
	}

}
