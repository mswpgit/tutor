<?php

namespace MBase\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 */
class Menu
{
	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var string
	 */
	private $menuType;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var string
	 */
	private $alias;

	/**
	 * @var string
	 */
	private $path;

	/**
	 * @var string
	 */
	private $link;

	/**
	 * @var boolean
	 */
	private $published;

	/**
	 * @var integer
	 */
	private $componentId;

	/**
	 * @var integer
	 */
	private $parentId;

	/**
	 * @var boolean
	 */
	private $home;

	/**
	 * @var string
	 */
	private $params;

	/**
	 * @var integer
	 */
	protected $childMenu;

	public function __construct()
	{
		$this->childMenu = new \Doctrine\Common\Collections\ArrayCollection;
	}

	public function setChildMenu($childMenu)
	{
		$this->childMenu = $childMenu;

		return $this;
	}

	public function getChildMenu()
	{
		return $this->childMenu;
	}

	/**
	 * @param string $alias
	 * @return $this
	 */
	public function setAlias($alias)
	{
		$this->alias = $alias;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getAlias()
	{
		return $this->alias;
	}

	/**
	 * @param int $componentId
	 * @return $this
	 */
	public function setComponentId($componentId)
	{
		$this->componentId = $componentId;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getComponentId()
	{
		return $this->componentId;
	}

	/**
	 * @param boolean $home
	 * @return $this
	 */
	public function setHome($home)
	{
		$this->home = $home;

		return $this;
	}

	/**
	 * @return boolean
	 */
	public function getHome()
	{
		return $this->home;
	}

	/**
	 * @param int $id
	 * @return $this
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param string $link
	 * @return $this
	 */
	public function setLink($link)
	{
		$this->link = $link;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getLink()
	{
		return $this->link;
	}

	/**
	 * @param string $menuType
	 * @return $this
	 */
	public function setMenuType($menuType)
	{
		$this->menuType = $menuType;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getMenuType()
	{
		return $this->menuType;
	}

	/**
	 * @param string $params
	 * @return $this
	 */
	public function setParams($params)
	{
		$this->params = $params;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * @param int $parentId
	 * @return $this
	 */
	public function setParentId($parentId)
	{
		$this->parentId = $parentId;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getParentId()
	{
		return $this->parentId;
	}

	/**
	 * @param string $path
	 * @return $this
	 */
	public function setPath($path)
	{
		$this->path = $path;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * @param boolean $published
	 * @return $this
	 */
	public function setPublished($published)
	{
		$this->published = $published;

		return $this;
	}

	/**
	 * @return boolean
	 */
	public function getPublished()
	{
		return $this->published;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

}