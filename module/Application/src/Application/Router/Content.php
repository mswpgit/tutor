<?php

namespace Application\Router;

use Zend\Mvc\Router\Http\RouteInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
//use Zend\Mvc\Router\RouteMatch;
use Zend\Mvc\Router\Http\RouteMatch;
use Zend\Stdlib\RequestInterface as Request;

class Content implements RouteInterface, ServiceLocatorAwareInterface
{

	protected $defaults = array();
	protected $routerPluginManager = null;

	public function __construct(array $defaults = array())
	{
		$this->defaults = $defaults;
	}

	public function setServiceLocator(\Zend\ServiceManager\ServiceLocatorInterface $routerPluginManager)
	{
		$this->routerPluginManager = $routerPluginManager;
	}

	public function getServiceLocator()
	{
		return $this->routerPluginManager;
	}

	public static function factory($options = array())
	{
		if ($options instanceof \Traversable)
		{
			$options = ArrayUtils::iteratorToArray($options);
		}
		elseif (!is_array($options))
		{
			throw new InvalidArgumentException(__METHOD__ . ' expects an array or Traversable set of options');
		}

		if (!isset($options['defaults']))
		{
			$options['defaults'] = array();
		}

		return new static($options['defaults']);
	}

	public function match(Request $request, $pathOffset = null)
	{
		if (!method_exists($request, 'getUri'))
		{
			return null;
		}

		$uri = $request->getUri();
		$fullPath = $uri->getPath();

		$path = substr($fullPath, $pathOffset);
		$alias = trim($path, '/');

//		\Zend\Debug\Debug::dump($uri);
//		\Zend\Debug\Debug::dump($fullPath);
//		\Zend\Debug\Debug::dump($path);
//		\Zend\Debug\Debug::dump($alias);
//die;

		$options = $this->defaults;
		$options = array_merge($options, array(
			'path' => $alias
		));
		\Zend\Debug\Debug::dump($options);
die;
		return new RouteMatch($options);
	}

	public function assemble(array $params = array(), array $options = array()) {
		if (array_key_exists('path', $params)) {
			return '/' . $params['path'];
		}

		return '/';
	}

	public function getAssembledParams() {
		return array();
	}

}