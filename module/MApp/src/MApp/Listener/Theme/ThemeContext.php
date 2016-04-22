<?php

namespace MApp\Listener\Theme;

use Zend\EventManager\SharedEventManagerInterface;
use Zend\EventManager\SharedListenerAggregateInterface;
use Zend\Mvc\Application;
use Zend\Mvc\MvcEvent;

class ThemeContext implements SharedListenerAggregateInterface
{
	/**
	 * @var \Zend\Stdlib\DispatchableInterface
	 */
	protected $target;

	/**
	 * @param  \Zend\EventManager\SharedEventManagerInterface $events
	 * @return void
	 */
	public function attachShared(SharedEventManagerInterface $events)
	{
		$this->listeners[] = $events->attach(
			'Zend\Stdlib\DispatchableInterface',
			'dispatch',
			array($this, 'captureTarget'),
			100
		);

		$this->listeners[] = $events->attach(
			'Zend\Stdlib\DispatchableInterface',
			MvcEvent::EVENT_DISPATCH,
			array($this, 'onDispatch'),
			-85
		);

		$this->listeners[] = $events->attach(
			'Zend\Mvc\Application',
			array(MvcEvent::EVENT_DISPATCH_ERROR, MvcEvent::EVENT_RENDER_ERROR),
			array($this, 'onError'),
			100
		);
	}

	/**
	 * @param  \Zend\EventManager\SharedEventManagerInterface $events
	 * @return void
	 */
	public function detachShared(SharedEventManagerInterface $events)
	{
		foreach ($this->listeners as $index => $listener)
		{
			if ($events->detach($listener))
			{
				unset($this->listeners[$index]);
			}
		}
	}

	/**
	 * @param  \Zend\Mvc\MvcEvent $event
	 * @return void
	 */
	public function captureTarget(MvcEvent $event)
	{
		if (! $this->target)
		{
			$this->target = $event->getTarget();
		}
	}

	/**
	 * @param  \Zend\Mvc\MvcEvent $event
	 * @return void
	 */
	public function onDispatch(MvcEvent $event)
	{
		$response = $event->getResponse();

		if (404 == $response->getStatusCode())
		{
			$this->notFound($event);
			return;
		}

		if ($event->getTarget() !== $this->target)
		{
			return;
		}

		$application = $event->getApplication();
		$serviceLocator = $application->getServiceManager();

		$serviceLocator->get('themeStrategy')
			->update($event);
	}

	/**
	 * @param  \Zend\Mvc\MvcEvent $event
	 * @return void
	 */
	public function onError(MvcEvent $event)
	{

		$error = $event->getError();
		switch ($error)
		{
			case Application::ERROR_CONTROLLER_NOT_FOUND:
			case Application::ERROR_CONTROLLER_INVALID:
			case Application::ERROR_ROUTER_NO_MATCH:
				$this->notFound($event);
				return;
		}

		$application    = $event->getApplication();
		$serviceLocator = $application->getServiceManager();

		$viewManager       = $serviceLocator->get('ViewManager');
		$exceptionStrategy = $viewManager->getExceptionStrategy();
		$renderer          = $viewManager->getRenderer();
		$options           = $serviceLocator->get('appThemeModule');

		$layout   = 'sc-default/layout/error/{side}';
		$template = 'sc-default/template/error/{side}-index';
		$side     = 'frontend';

		$theme = $options->getCurrentTheme();
		if (isset($renderer->layout()->regions))
		{
			unset($renderer->layout()->regions);
		}

		if (isset($theme['errors']['template']['exception']))
		{
			$template = $theme['errors']['template']['exception'];
		}

		if (isset($theme['errors']['layout']))
		{
			$layout = $theme['errors']['layout'];
		}

		$template = str_replace('{side}', $side, $template);
		$layout   = str_replace('{side}', $side, $layout);
//		\Zend\Debug\Debug::dump($template);die;
		$exceptionStrategy->setExceptionTemplate($template);
		$renderer->layout()->setTemplate($layout);
	}

	/**
	 * @param  \Zend\Mvc\MvcEvent $event
	 * @return void
	 */
	public function notFound(MvcEvent $event)
	{


		$application    = $event->getApplication();
		$serviceLocator = $application->getServiceManager();

		$viewManager      = $serviceLocator->get('ViewManager');
		$notFoundStrategy = $viewManager->getRouteNotFoundStrategy();
		$renderer         = $viewManager->getRenderer();
		$options          = $serviceLocator->get('themeModule');

		$layout   = 'sc-default/layout/error/{side}';
		$template = 'sc-default/template/error/{side}-404';
		$side     = 'frontend';

		$theme = $options->getFrontendTheme();
		if (isset($renderer->layout()->regions))
		{
			unset($renderer->layout()->regions);
		}

		if (isset($theme['errors']['template']['404']))
		{
			$template = $theme['errors']['template']['404'];
		}

		if (isset($theme['errors']['layout']))
		{
			$layout = $theme['errors']['layout'];
		}

		$template = str_replace('{side}', $side, $template);
		$layout   = str_replace('{side}', $side, $layout);
//		\Zend\Debug\Debug::dump($template);
//		\Zend\Debug\Debug::dump($layout);
//		\Zend\Debug\Debug::dump($template);die;
		$notFoundStrategy->setNotFoundTemplate($template);
		$renderer->layout()->setTemplate($layout);
	}
}
