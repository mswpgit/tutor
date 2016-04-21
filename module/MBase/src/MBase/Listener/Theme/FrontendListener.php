<?php

namespace MBase\Listener\Theme;

use Zend\View\Model\ModelInterface as ViewModel,
	Zend\Mvc\MvcEvent;

class FrontendListener extends AbstractThemeStrategy
{




	public function update(MvcEvent $event)
	{
		$target = $event->getTarget();
//		if (! $target instanceof AbstractFront) {
//			throw new \DomainException(sprintf(
//				"Frontend theme strategy is not applicable to current target '%s'.",
//				is_object($target) ? get_class($target) : gettype($target)
//			));
//		}

//		\Zend\Debug\Debug::dump('ddddddddddd');die;
		$this->injectContentTemplate($event)
			->injectLayoutTemplate($event)
			->buildLayout($event);
	}

	/**
	 * Inject a template into the content view model, if none present
	 *
	 * @param  \Zend\Mvc\MvcEvent
	 * @return AbstractThemeStrategy
	 */
	protected function injectContentTemplate(MvcEvent $event)
	{
		$model = $event->getResult();

		if (! $model instanceof ViewModel)
		{
			return $this;
		}
		if ($model->getTemplate())
		{
			return $this;
		}

		$routeMatch   = $event->getRouteMatch();
		$themeName    = $this->getThemeName();
		$themeOptions = $this->getThemeOptions();

		$options = array();
		if (isset($themeOptions[static::$side]))
		{
			$options = $themeOptions[static::$side];
		}

		if (isset($options['templates']))
		{
			$templatesPath = rtrim($options['templates'], '/') . '/';
		}
		else
		{
			$templatesPath = str_replace(
				array('{theme}', '{side}'),
				array($themeName, static::$side),
				self::DefaultTemplatesPath
			);
		}

		$controller = $event->getTarget();
		if ($controller)
		{
			$controller = get_class($controller);
		}
		else
		{
			$controller = $routeMatch->getParam('controller', '');
		}
		$controller = $this->deriveControllerClass($controller);
		$template = $templatesPath . $this->inflectName($controller);

		$action  = $routeMatch->getParam('action');
		if (null !== $action)
		{
			$template .= '/' . $this->inflectName($action);
		}
		$model->setTemplate($template);

		return $this;
	}

	/**
	 * Inject a template into the layout view model, if none present
	 *
	 * @param  \Zend\Mvc\MvcEvent
	 * @return AbstractThemeStrategy
	 */
	protected function injectLayoutTemplate(MvcEvent $event)
	{
		$model = $event->getResult();

		if (! $model instanceof ViewModel)
		{
			return $this;
		}
		if ($model->terminate())
		{
			return $this;
		}

		$viewManager  = $this->getViewManager();

		$renderer     = $viewManager->getRenderer();

		$themeName    = $this->getThemeName();
		$themeOptions = $this->getThemeOptions();

		$options = array();
		if (isset($themeOptions[static::$side]))
		{
			$options = $themeOptions[static::$side];
		}

		if (isset($options['layouts']))
		{
			$layoutsPath = rtrim($options['layouts'], '/') . '/';
		}
		else
		{
			$layoutsPath = str_replace(
				array('{theme}', '{side}'),
				array($themeName, static::$side),
				self::DefaultLayoutsPath
			);
		}

		$layout = $event->getViewModel();
		if ($layout && 'layout/layout' !== $layout->getTemplate())
		{
			$layout->setTemplate(
				str_replace('{layouts}', $layoutsPath, $layout->getTemplate())
			);
			return $this;
		}

		$defaultLayout = self::DefaultLayout;
		if(isset($options['default_layout']))
		{
			$defaultLayout = $options['default_layout'];
		}
		$renderer->layout()->setTemplate($layoutsPath . $defaultLayout);
//
		return $this;
	}

	/**
	 * @param  \Zend\Mvc\MvcEvent $event
	 * @return FrontendStrategy
	 */
	protected function buildLayout(MvcEvent $event)
	{
//		if (! $event->getParam(AbstractFront::EnableRegions, true)) {
//			return $this;
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
