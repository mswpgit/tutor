<?php

namespace MBase\Listener\Theme;

use MBase\Options\ThemeOptions,
	MBase\Exception\IoCException,
	//
	Zend\Filter\Word\CamelCaseToDash,
	Zend\Mvc\MvcEvent;

abstract class AbstractThemeListener
{
	/**
	 * @var \MBase\Options\ThemeOptions
	 */
	protected $moduleOptions;

	/**
	 * @var \Zend\Filter\Word\CamelCaseToDash
	 */
	protected $inflector;

	/**
	 * @param \MBase\Options\ThemeOptions $options
	 */
	public function setModuleOptions(ThemeOptions $options)
	{
		$this->moduleOptions = $options;
	}

	/**
	 * @throws \MBase\Exception\IoCException
	 * @return \MBase\Options\ThemeOptions
	 */
	public function getModuleOptions()
	{
		if(!$this->moduleOptions instanceof ThemeOptions)
		{
			throw new IoCException(
				'The module options were not set.'
			);
		}
		return $this->moduleOptions;
	}

	/**
	 * @param \Zend\Mvc\MvcEvent $event
	 */
	public abstract function update(MvcEvent $event);

	/**
	 * @param string $name
	 * @return string
	 */
	protected function inflectName($name)
	{
		if(!$this->inflector instanceof CamelCaseToDash)
		{
			$this->inflector = new CamelCaseToDash();
		}

		$name = $this->inflector->filter($name);
		return strtolower($name);
	}

	/**
	 * @param string $controller
	 * @return string
	 */
	protected function deriveControllerClass($controller)
	{
		if(strstr($controller, '\\'))
		{
			$controller = substr($controller, strrpos($controller, '\\') + 1);
		}

		if((10 < strlen($controller)) && ('Controller' == substr($controller, -10)))
		{
			$controller = substr($controller, 0, -10);
		}

		return $controller;
	}
}
