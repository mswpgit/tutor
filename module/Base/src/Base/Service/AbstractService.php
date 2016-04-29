<?php

namespace Base\Service;

use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Base\EventManager\EventProvider;

abstract class AbstractService extends EventProvider implements ServiceManagerAwareInterface
{
	/**
	 * @var
	 */
	protected $mapper;

	/**
	 * @var ServiceManager
	 */
	protected $serviceManager;

	public function __construct($mapper)
	{
		$this->setMapper($mapper);
	}

	/**
	 * @param  $mapper
	 *
	 * @return $this
	 */
	public function setMapper($mapper)
	{
		$this->mapper = $mapper;
		return $this;
	}

	/**
	 * @return
	 */
	public function getMapper()
	{
		return $this->mapper;
	}

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
