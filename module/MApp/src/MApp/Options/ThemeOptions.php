<?php

namespace MApp\Options;

use Zend\Stdlib\AbstractOptions;

class ThemeOptions extends AbstractOptions
{

	/**
	 * @var array
	 */
	protected $widgets = array();

	/**
	 * @var string
	 */
	protected $themeName = 'sc-default';

	/**
	 * @var array
	 */
	protected $themes = array();

	/**
	 * @param array $widgets
	 * @return void
	 */
	public function setWidgets($widgets)
	{
		if (is_array($widgets))
		{
			$this->widgets = $widgets;
		}
		return $this;
	}

	/**
	 * @return array
	 */
	public function getWidgets()
	{
		return $this->widgets;
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function setThemeName($name)
	{
		$this->themeName = $name;
	}

	/**
	 * @return string
	 */
	public function getThemeName()
	{
		return $this->themeName;
	}

	/**
	 * @param  array $themes
	 * @return void
	 */
	public function setThemes($themes)
	{
		$this->themes = $themes;
	}

	/**
	 * @return array
	 */
	public function getThemes()
	{
		return $this->themes;
	}

	/**
	 * @param  string $name
	 * @return boolean
	 */
	public function themeExists($name)
	{
		return isset($this->themes[$name]);
	}

	/**
	 * @param  string $name
	 * @throws \DomainException
	 * @return array
	 */
	public function getThemeByName($name)
	{
		if (!$this->themeExists($name))
		{
			throw new \DomainException(sprintf(
				"Unknown theme '%s'.",
				$name
			));
		}
		return $this->themes[$name];
	}

	/**
	 * @throws \DomainException
	 * @return array
	 */
	public function getCurrentTheme()
	{
		if (!$this->themeExists($this->themeName))
		{
//			throw new \DomainException(sprintf(
//				"Unknown theme '%s'.",
//				$this->themeName
//			));
			return array();
		}
		return $this->themes[$this->themeName];
	}

	/**
	 * @param  string $name
	 * @throws \DomainException
	 * @return array
	 */
	public function getWidgetByName($name)
	{
		if (! isset($this->widgets[$name])) {
			throw new \DomainException(sprintf(
				"Unknown widget '%s'.",
				$name
			));
		}
		return $this->widgets[$name];
	}

}
