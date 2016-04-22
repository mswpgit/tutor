<?php

namespace MApp\Listener\Theme;

use Zend\View\Model\ModelInterface as ViewModel;
use Zend\Mvc\MvcEvent;

class ThemeStrategy extends AbstractThemeStrategy
{
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
		return $this;
//		}

		$result = $event->getResult();
		if (! $result instanceof ViewModel || $result->terminate()) {
			return $this;
		}

//		$controller = $event->getTarget();
//		if (! $controller instanceof AbstractFront) {
//			return $this;
//		}

		$layout = $event->getViewModel();
		if (! $layout instanceof ViewModel) {
			return $this;
		}

		$moduleOptions = $this->getThemeOptions();
//		$controllerManager = $this->getControllerManager();

		$regions = array();//$this->getRegions();
		$layout->regions = $regions;

		foreach ($regions as $widgetsList)
		{
			foreach ($widgetsList as $item) {
//				$widgetName = $item->getName();
//				$widget = $moduleOptions->getWidgetByName($widgetName);
//
//				if ($widgetName === 'content') {
//					$item->setId($item->getName());
//					continue;
//				}
//
//				if (! isset($widget['frontend'])) {
//					continue;
//				}
//
//				if (! $controllerManager->has($widget['frontend'])) {
//					continue;
//				}
//
//				$widgetController = $controllerManager->get($widget['frontend']);
//				if (! $widgetController instanceof AbstractWidget) {
//					continue;
//				}
//				$widgetController->setItem($item);
//
//				$childModel = $controller->forward()->dispatch(
//					$widget['frontend'],
//					['action' => 'front']
//				);
//				$layout->addChild($childModel, $item->getId());
			}
		}
		return $this;
	}

	/**
	 * @return \ScContent\Entity\Front\Regions
	 */
	protected function getRegions()
	{
		$mapper = $this->getLayotMapper();
		$moduleOptions = $this->getThemeOptions();

		$contentService = $this->getContentService();
		$content = $contentService->getContent();

		$themeName = $moduleOptions->getFrontendThemeName();
		$regions = $mapper->findRegions($themeName, $content->getId());

		return $regions;
	}
}
