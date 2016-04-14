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
	 * @var string
	 */
	private $type;

	/**
	 * @var integer
	 */
	private $parentMenu;
	/**
	 * @var integer
	 */
	private $childMenu;

	/**
	 * @var boolean
	 */
	private $home;

	/**
	 * @var string
	 */
	private $params;

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
	 * @param string $type
	 * @return $this
	 */
	public function setType($type)
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getType()
	{
		return $this->type;
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
	 * @param int $parentMenu
	 * @return $this
	 */
	public function setParentMenu($parentMenu)
	{
		$this->parentMenu = $parentMenu;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getParentMenu()
	{
		return $this->parentMenu;
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