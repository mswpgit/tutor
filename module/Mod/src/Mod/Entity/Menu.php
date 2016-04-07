<?php

namespace Mod\Entity;

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
	private $description;

	/**
	 * @var boolean
	 */
	private $isActive;

	/**
	 * @var integer
	 */
	private $parentId;

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set isActive
	 *
	 * @param boolean $isActive
	 * @return Menu
	 */
	public function setIsActive($isActive)
	{
		$this->isActive = $isActive;

		return $this;
	}

	/**
	 * Get isActive
	 *
	 * @return boolean
	 */
	public function getIsActive()
	{
		return $this->isActive;
	}

	/**
	 * Set menuType
	 *
	 * @param string $menuType
	 * @return Menu
	 */
	public function setMenuType($menuType)
	{
		$this->menuType = $menuType;

		return $this;
	}

	/**
	 * Get string
	 *
	 * @return string
	 */
	public function getMenuType()
	{
		return $this->menuType;
	}

	/**
	 * Set title
	 *
	 * @param string $title
	 * @return Menu
	 */
	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * Get title
	 *
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Set description
	 *
	 * @param string $description
	 * @return Menu
	 */
	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * Get description
	 *
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Set parentId
	 *
	 * @param string $parentId
	 * @return Menu
	 */
	public function setParentId($parentId)
	{
		$this->parentId = $parentId;

		return $this;
	}

	/**
	 * Get description
	 *
	 * @return string
	 */
	public function getParentId()
	{
		return $this->parentId;
	}

}