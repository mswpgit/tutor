<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Menu
 *
 * @ORM\Entity
 * @ORM\Table(name="menu")
 * @ORM\Entity(repositoryClass="Application\Entity\Repository\MenuRepository")
 */
class Menu
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(name="id", type="integer")
	 */
	private $id;

	/**
	 *
	 * @ORM\Column(name="menu_type", type="text")
	 */
	private $menu_type;

	/**
	 *
	 * @ORM\Column(name="title", type="text")
	 */
	private $title;

	/**
	 *
	 * @ORM\Column(name="alias", type="text")
	 */
	private $alias;

	/**
	 *
	 * @ORM\Column(name="path", type="text")
	 */
	private $path;

	/**
	 *
	 * @ORM\Column(name="link", type="text")
	 */
	private $link;

	/**
	 *
	 * @ORM\Column(name="params", type="text")
	 */
	private $params;
	
	public function setAlias($alias)
	{
		$this->alias = $alias;
	}

	public function getAlias()
	{
		return $this->alias;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setLink($link)
	{
		$this->link = $link;
	}

	public function getLink()
	{
		return $this->link;
	}

	public function setMenuType($menu_type)
	{
		$this->menu_type = $menu_type;
	}

	public function getMenuType()
	{
		return $this->menu_type;
	}

	public function setParams($params)
	{
		$this->params = $params;
	}

	public function getParams()
	{
		return $this->params;
	}

	public function setPath($path)
	{
		$this->path = $path;
	}

	public function getPath()
	{
		return $this->path;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getTitle()
	{
		return $this->title;
	}

}