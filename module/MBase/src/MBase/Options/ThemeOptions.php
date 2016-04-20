<?php

namespace MBase\Options;

use Zend\Stdlib\AbstractOptions;

class ThemeOptions extends AbstractOptions
{
	/**
	 * @var array
	 */
	protected $installation;

	/**
	 * @var array
	 */
	protected $widgets = array();

	/**
	 * @var array
	 */
	protected $db = array();

	/**
	 * @var string
	 */
	protected $frontendThemeName = 'sc-default';

	/**
	 * @var string
	 */
	protected $backendThemeName = 'sc-default';

	/**
	 * @var array
	 */
	protected $themes = array();

	/**
	 * @var string
	 */
	protected $appAutoloadDir = '/config/autoload';

	/**
	 * @var string
	 */
	protected $appPublicDir = '/public';

	/**
	 * @var string
	 */
	protected $appUploadsDir = '/public/uploads';

	/**
	 * @var string
	 */
	protected $appUploadsSrc = 'uploads';

	/**
	 * @var string
	 */
	protected $fileTypesCatalogClass = 'ScContent\Service\FileTypesCatalog';

	/**
	 * @var string
	 */
	protected $entityBackCategoryClass = 'ScContent\Entity\Back\Category';

	/**
	 * @var string
	 */
	protected $enityBackArticleClass = 'ScContent\Entity\Back\Article';

	/**
	 * @var string
	 */
	protected $entityBackFileClass = 'ScContent\Entity\Back\File';

	/**
	 * @param array $options
	 * @return void
	 */
	public function setInstallation($options)
	{
		$this->installation = $options;
	}

	/**
	 * @return array
	 */
	public function getInstallation()
	{
		return $this->installation;
	}

	/**
	 * @param array $widgets
	 * @return void
	 */
	public function setWidgets($widgets)
	{
		if (is_array($widgets)) {
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
	 * @param array $db
	 * @return void
	 */
	public function setDb($db)
	{
		if (is_array($db)) {
			$this->db = $db;
		}
		return $this;
	}

	/**
	 * @return array
	 */
	public function getDb()
	{
		return $this->db;
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function setFrontendThemeName($name)
	{
		$this->frontendThemeName = $name;
	}

	/**
	 * @return string
	 */
	public function getFrontendThemeName()
	{
		return $this->frontendThemeName;
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function setBackendThemeName($name)
	{
		$this->backendThemeName = $name;
	}

	/**
	 * @return string
	 */
	public function getBackendThemeName()
	{
		return $this->backendThemeName;
	}

	/**
	 * @param array $themes
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
	 * @return array
	 */
	public function getFrontendTheme()
	{
		if (! isset($this->themes[$this->frontendThemeName])) {
			throw new \InvalidArgumentException(sprintf(
				"Missing frontend theme '%s'.",
				$this->frontendThemeName
			));
		}
		return $this->themes[$this->frontendThemeName];
	}

	/**
	 * @return array
	 */
	public function getBackendTheme()
	{
		if (! isset($this->themes[$this->backendThemeName])) {
			throw new \InvalidArgumentException(sprintf(
				"Missing backend theme '%s'.",
				$this->frontendThemeName
			));
		}
		return $this->themes[$this->backendThemeName];
	}

	/**
	 * @param string $dir
	 * @return void
	 */
	public function setAppAutoloadDir($dir)
	{
		$this->appAutoloadDir = $dir;
	}

	/**
	 * @return string
	 */
	public function getAppAutoloadDir()
	{
		return $this->appAutoloadDir;
	}

	/**
	 * @param string $dir
	 * @return void
	 */
	public function setAppPublicDir($dir)
	{
		$this->appPublicDir = $dir;
	}

	/**
	 * @return string
	 */
	public function getAppPublicDir()
	{
		return $this->appPublicDir;
	}

	/**
	 * @param string $dir
	 * @return void
	 */
	public function setAppUploadsDir($dir)
	{
		$this->appUploadsDir = $dir;
	}

	/**
	 * @return string
	 */
	public function getAppUploadsDir()
	{
		return $this->appUploadsDir;
	}

	/**
	 * @param string $src
	 * @return void
	 */
	public function setAppUploadsSrc($src)
	{
		$this->appUploadsSrc = $src;
	}

	/**
	 * @return string
	 */
	public function getAppUploadsSrc()
	{
		return $this->appUploadsSrc;
	}

	/**
	 * @param string $class
	 * @return void
	 */
	public function setFileTypesCatalogClass($class)
	{
		$this->fileTypesCatalogClass = $class;
	}

	/**
	 * @return string
	 */
	public function getFileTypesCatalogClass()
	{
		return $this->fileTypesCatalogClass;
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function setEntityBackCategoryClass($name)
	{
		$this->entityBackCategoryClass = $name;
	}

	/**
	 * @return string
	 */
	public function getEntityBackCategoryClass()
	{
		return $this->entityBackCategoryClass;
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function setEntityBackArticleClass($name)
	{
		$this->entityBackArticleClass = $name;
	}

	/**
	 * @return string
	 */
	public function getEntityBackArticleClass()
	{
		return $this->enityBackArticleClass;
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function setEntityBackFileClass($name)
	{
		$this->entityBackFileClass = $name;
	}

	/**
	 * @return string
	 */
	public function getEntityBackFileClass()
	{
		return $this->entityBackFileClass;
	}
}
