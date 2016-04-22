<?php

namespace MApp\Listener\Theme;

use MApp\Options\ThemeOptions;
use MBase\Exception\IoCException;
	//
use Zend\View\Model\ModelInterface as ViewModel;
use Zend\Mvc\View\Http\ViewManager;
use Zend\Filter\Word\CamelCaseToDash;
use Zend\Mvc\MvcEvent;

abstract class AbstractThemeStrategy
{
	/**
	 * @const string
	 */
	const DefaultTemplatesPath = '{theme}/template/{side}/';

	/**
	 * @const string
	 */
	const DefaultLayoutsPath = '{theme}/layout/{side}/';

	/**
	 * @const string
	 */
	const DefaultLayout = 'index';

	/**
	 * @var string
	 */
	protected static $side = 'common';

	/**
	 * @var \Zend\Mvc\View\Http\ViewManager
	 */
	protected $viewManager;

	/**
	 * @var \MApp\Options\ThemeOptions
	 */
	protected $themeOptions;

	/**
	 * @var \Zend\Filter\Word\CamelCaseToDash
	 */
	protected $inflector;

	/**
	 * @param  \Zend\Mvc\View\Http\ViewManager $viewManager
	 * @return AbstractThemeStrategy
	 */
	public function setViewManager(ViewManager $viewManager)
	{
		$this->viewManager = $viewManager;

		return $this;
	}

	/**
	 * @throws \MBase\Exception\IoCException
	 * @return \Zend\Mvc\View\Http\ViewManager
	 */
	public function getViewManager()
	{
		if (!$this->viewManager instanceof ViewManager)
		{
			throw new IoCException(
				'The view manager was not set.'
			);
		}

		return $this->viewManager;
	}

	/**
	 * @param  $options \MApp\Options\ThemeOptions
	 * @return void
	 */
	public function setThemeOptions(ThemeOptions $options)
	{
		$this->themeOptions = $options;
	}

	/**
	 * @throws \MBase\Exception\IoCException
	 * @return \MApp\Options\ThemeOptions
	 */
	public function getThemeOptions()
	{
		if (! $this->themeOptions instanceof ThemeOptions)
		{
			throw new IoCException(
				'The module options were not set.'
			);
		}
		return $this->themeOptions;
	}

	/**
	 * @param \Zend\Mvc\MvcEvent $event
	 */
	public abstract function update(MvcEvent $event);

	/**
	 * Inject a template into the content view model, if none present
	 *
	 * @param  \Zend\Mvc\MvcEvent
	 * @return AbstractThemeStrategy
	 */
	protected function injectContentTemplate(MvcEvent $event)
	{
		$model = $event->getResult();

		if (! $model instanceof ViewModel) {
			return $this;
		}
		if ($model->getTemplate()) {
			return $this;
		}

		$routeMatch   = $event->getRouteMatch();

		$themesOptions = $this->getThemeOptions();
		$themeName     = $themesOptions->getThemeName();
		$themeOptions  = $themesOptions->getThemeByName($themeName);

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

		if (! $model instanceof ViewModel) {
			return $this;
		}
		if ($model->terminate()) {
			return $this;
		}

		$viewManager  = $this->getViewManager();
		$renderer     = $viewManager->getRenderer();

		$themesOptions = $this->getThemeOptions();
		$themeName     = $themesOptions->getThemeName();
		$themeOptions  = $themesOptions->getThemeByName($themeName);

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

		return $this;
	}


	/**
	 * @param  string $name
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
	 * @param  string|object $controller
	 * @return string
	 */
	protected function deriveControllerClass($controller)
	{
		if(is_object($controller))
		{
			$controller = get_class($controller);
		}

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
