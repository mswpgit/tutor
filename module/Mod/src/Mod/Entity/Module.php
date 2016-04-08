<?php

namespace Mod\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 */
class Module
{
	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var boolean
	 */
	private $title;
	/**
	 * @var text
	 */
	private $content;

	/**
	 * @var integer
	 */
	private $ordering;

	/**
	 * @var string
	 */
	private $position;

	/**
	 * @var boolean
	 */
	private $published;

	/**
	 * @var string
	 */
	private $module;

	/**
	 * @var text
	 */
	private $params;

	/**
	 * @param \Mod\Entity\text $content
	 */
	public function setContent($content)
	{
		$this->content = $content;
	}

	/**
	 * @return \Mod\Entity\text
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param string $module
	 */
	public function setModule($module)
	{
		$this->module = $module;
	}

	/**
	 * @return string
	 */
	public function getModule()
	{
		return $this->module;
	}

	/**
	 * @param int $ordering
	 */
	public function setOrdering($ordering)
	{
		$this->ordering = $ordering;
	}

	/**
	 * @return int
	 */
	public function getOrdering()
	{
		return $this->ordering;
	}

	/**
	 * @param \Mod\Entity\text $params
	 */
	public function setParams($params)
	{
		$this->params = $params;
	}

	/**
	 * @return \Mod\Entity\text
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * @param string $position
	 */
	public function setPosition($position)
	{
		$this->position = $position;
	}

	/**
	 * @return string
	 */
	public function getPosition()
	{
		return $this->position;
	}

	/**
	 * @param boolean $published
	 */
	public function setPublished($published)
	{
		$this->published = $published;
	}

	/**
	 * @return boolean
	 */
	public function getPublished()
	{
		return $this->published;
	}

	/**
	 * @param boolean $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @return boolean
	 */
	public function getTitle()
	{
		return $this->title;
	}



}