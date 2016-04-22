<?php

namespace MApp\Listener\Theme;

use Zend\View\Model\ModelInterface as ViewModel;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Controller\ControllerManager;
use MBase\Exception\IoCException;
use Zend\Stdlib\Hydrator\ArraySerializable;
use Zend\StdLib\Hydrator\HydratorInterface;

class ThemeStrategy extends AbstractThemeStrategy
{
	/**
	 * @var \Zend\Mvc\Controller\ControllerManager
	 */
	protected $controllerManager;

	/**
	 * @var \Zend\Stdlib\Hydrator\HydratorInterface
	 */
	protected $_hydrator;


	/**
	 * @param  \Zend\Mvc\Controller\ControllerManager $manager
	 * @return FrontendLayoutService
	 */
	public function setControllerManager(ControllerManager $manager)
	{
		$this->controllerManager = $manager;
	}

	/**
	 * @throws \MBase\Exception\IoCException
	 * @return \Zend\Mvc\Controller\ControllerManager
	 */
	public function getControllerManager()
	{
		if (! $this->controllerManager instanceof ControllerManager) {
			throw new IoCException(
				'The controller manager was not set.'
			);
		}
		return $this->controllerManager;
	}


	public function update(MvcEvent $event)
	{

//		\Zend\Debug\Debug::dump('dddddddd22222222fffffff');die;
		$target = $event->getTarget();
//		if (! $target instanceof AbstractFront) {
//			throw new \DomainException(sprintf(
//				"Frontend theme strategy is not applicable to current target '%s'.",
//				is_object($target) ? get_class($target) : gettype($target)
//			));
//		}

		$this->injectContentTemplate($event)
			->injectLayoutTemplate($event)
			->buildLayout($event);
	}

	/**
	 * @param  \Zend\Mvc\MvcEvent $event
	 * @return FrontendStrategy
	 */
	protected function buildLayout(MvcEvent $event)
	{
//		if (! $event->getParam(AbstractFront::EnableRegions, true)) {
//		return $this;
//		}

		$result = $event->getResult();
		if (! $result instanceof ViewModel || $result->terminate()) {
			return $this;
		}

		$controller = $event->getTarget();
//		if (! $controller instanceof AbstractFront) {
//			return $this;
//		}

		$layout = $event->getViewModel();
		if (! $layout instanceof ViewModel) {
			return $this;
		}

		$moduleOptions = $this->getThemeOptions();
		$controllerManager = $this->getControllerManager();

		$regions = $this->getRegions();

//		\Zend\Debug\Debug::dump($regions);die;

		$layout->regions = $regions;
		foreach ($regions as $widgetsList) {
			foreach ($widgetsList as $item) {

//				\Zend\Debug\Debug::dump($item->getName());die;




//				\Zend\Debug\Debug::dump($item);die;
				$widgetName = $item->getName();
				$widget = $moduleOptions->getWidgetByName($widgetName);




				if ($widgetName === 'content') {
					$item->setId($item->getName());
					continue;
				}
//
//				if (! isset($widget['frontend'])) {
//					continue;
//				}

				if (! $controllerManager->has($widget['controller'])) {
					continue;
				}

				$widgetController = $controllerManager->get($widget['controller']);
//				if (! $widgetController instanceof AbstractWidget) {
//					continue;
//				}
				$widgetController->setItem($item);
//				\Zend\Debug\Debug::dump('ddddddddddd');die;
				$childModel = $controller->forward()->dispatch(
					$widget['controller'],
					array('action' => 'index')
				);

//				\Zend\Debug\Debug::dump($childModel);die;
				$layout->addChild($childModel, $item->getId());
			}
		}

		return $this;
	}

	/**
	 * @return \MApp\Entity\Regions
	 */
	protected function getRegions()
	{
		$moduleOptions = $this->getThemeOptions();

		$theme = $moduleOptions->getCurrentTheme();

		$regions = new \MApp\Entity\Regions($moduleOptions);

		$results = $theme[static::$side]['regions'];

		$hydrator = $this->getHydrator();
		$itemPrototype = new \MApp\Entity\Widget();

		foreach ($results as $name=>$result)
		{
			if (isset($result['contains']))
			{
				foreach($result['contains'] as $contains)
				{
					// TODO переделать from BD
					$widget = $moduleOptions->getWidgetByName($contains);
					$result['region'] = $name;
					$result['theme']  = static::$side;
					$result['name']   = $contains;
					$item = clone ($itemPrototype);
					$hydrator->hydrate(array_merge($result, $widget), $item);
					$regions->addItem($item);
				}
			}
		}

		return $regions;
	}

	/**
	 * @param  \Zend\Stdlib\Hydrator\HydratorInterface $hydrator
	 * @return AbstractDbMapper
	 */
	public function setHydrator(HydratorInterface $hydrator)
	{
		$this->_hydrator = $hydrator;
		return $this;
	}

	/**
	 * @return \Zend\Stdlib\Hydrator\HydratorInterface
	 */
	public function getHydrator()
	{
		if (! $this->_hydrator instanceof HydratorInterface)
		{
			$this->_hydrator = new ArraySerializable();
		}
		return $this->_hydrator;
	}
}
