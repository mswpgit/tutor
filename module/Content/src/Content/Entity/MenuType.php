<?php

namespace Content\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenuType
 */
class MenuType
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
	private $description;
	/**
	 * @param string $description
	 * @return $this
	 */
	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}
	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
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
